<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Microsoft\Graph\Graph;

use Microsoft\Graph\Model;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\MicrosoftGraph\TokenCache;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Exception\ClientException;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

class MicrosoftGraphLoginController extends Controller
{
    //
       //
       public function signin()
       {
         // Initialize the OAuth client
         $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
           'clientId'                => env('OAUTH_APP_ID'),
           'clientSecret'            => env('OAUTH_APP_PASSWORD'),
           'redirectUri'             => env('OAUTH_REDIRECT_URI'),
           'urlAuthorize'            => env('OAUTH_AUTHORITY').env('OAUTH_AUTHORIZE_ENDPOINT'),
           'urlAccessToken'          => env('OAUTH_AUTHORITY').env('OAUTH_TOKEN_ENDPOINT'),
           'urlResourceOwnerDetails' => '',
           'scopes'                  => env('OAUTH_SCOPES')
         ]);
     
         $authUrl = $oauthClient->getAuthorizationUrl();
   
         // Save client state so we can validate in callback
         session(['oauthState' => $oauthClient->getState()]);
   
         // Redirect to AAD signin page
         return redirect()->away($authUrl);
       }
     
       public function callback(Request $request)
       {
   
         // Validate state
         $expectedState = session('oauthState');
         $request->session()->forget('oauthState');
         $providedState = $request->query('state');
     
   
   
         if (!isset($expectedState)) {
           // If there is no expected state in the session,
           // do nothing and redirect to the home page.
           return redirect('/');
         }
     
         if (!isset($providedState) || $expectedState != $providedState) {
           return redirect('/')
             ->with('error', 'Invalid auth state')
             ->with('errorDetail', 'The provided auth state did not match the expected value');
         }

         // Authorization code should be in the "code" query param
         $authCode = $request->query('code');
         if (isset($authCode)) {
           // Initialize the OAuth client
           $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
             'clientId'                => env('OAUTH_APP_ID'),
             'clientSecret'            => env('OAUTH_APP_PASSWORD'),
             'redirectUri'             => env('OAUTH_REDIRECT_URI'),
             'urlAuthorize'            => env('OAUTH_AUTHORITY').env('OAUTH_AUTHORIZE_ENDPOINT'),
             'urlAccessToken'          => env('OAUTH_AUTHORITY').env('OAUTH_TOKEN_ENDPOINT'),
             'urlResourceOwnerDetails' => '',
             'scopes'                  => env('OAUTH_SCOPES')
           ]);
     

           try {
             // Make the token request
             $accessToken = $oauthClient->getAccessToken('authorization_code', [
               'code' => $authCode
             ]);
             
             // Get User Information '/me'
             $graph = new Graph();
             $graph->setAccessToken($accessToken->getToken());
     
             $user = $graph->createRequest('GET', '/me')
               ->setReturnType(Model\User::class)
               ->execute();

             $profilePhoto = "";
             try {
               $stream = $graph->createRequest('GET', '/me/photos/96x96/$value')
                 ->setReturnType(\Psr\Http\Message\StreamInterface::class)
                 ->execute();

                if (isset($stream)) {
                  $profilePhoto = $stream->getContents();
                }
  
              } catch(ClientException $e) {
                 if ($e->getResponse()->getStatusCode() == '404') {
                   // No action 
                 } else {
                     dd('throw error if not 404');
                 // throw ExceptionWrapper::wrapGuzzleBadResponseException($e);
                 }
              }

            $tokenCache = new TokenCache();
            $tokenCache->storeTokens($accessToken, $user, $profilePhoto);

            // To Retrieve "samaccountname" and "GUID"
            $parsedToken = $this->parseToken($accessToken);
            // find or create a new user 
            $isUser = User::where('azure_id', $user->getId() )->first();

            if ($isUser) {
                if (!($isUser->hasRole('employee'))) {
                    $isUser->assignRole('employee'); 
                }

                if (!($isUser->guid)) {
                  if (array_key_exists('bcgovGUID', $parsedToken)) {
                      $isUser->samaccountname = property_exists($parsedToken, 'samaccountname') ? $parsedToken->samaccountname : null;
                      $isUser->guid = property_exists($parsedToken, 'bcgovGUID') ? $parsedToken->bcgovGUID : null;
                      $isUser->save();
                  }
                }
 
                //Auth::login($isUser);
                Auth::loginUsingId( $isUser->id );

            } else {

                $createUser = User::create([
                    'name' => $user->getDisplayName(),
                    'email' => $user->getMail(),
                    'azure_id' => $user->getId(),
                    'password' => Hash::make('WatchDog'),
                    'samaccountname' => property_exists($parsedToken, 'samaccountname') ? $parsedToken->samaccountname : null,
                    'guid' => property_exists($parsedToken, 'bcgovGUID') ? $parsedToken->bcgovGUID : null,
                ]);

                // assign default role 'employee'
                $createUser->assignRole('employee');

                //Auth::login($createUser);
                Auth::loginUsingId( $createUser->id );

                $request->session()->regenerate();

            }

            return redirect()->intended(RouteServiceProvider::HOME);
            //return redirect('/dashboard');

           }

           catch (League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

             Log::error( $e );

             return redirect('/')
              //  ->with('error', 'Error requesting access token')
              //  ->with('errorDetail', $e->getMessage());
              ->withErrors([
                'error' => 'Error requesting access token',
                'errorDetail' =>  $e->getMessage(),
              ]);
           }
         }

         Log::error( '[Error on function callback in MicrosoftGraphLoginController.php --Empty Authorization code] ' .
                   $request->query('error_description') );
                 
         return redirect('/')
              ->withErrors([
               'error' => $request->query('error'),
               'errorDetail' => $request->query('error_description'),
           ]);
       }
     
       // <SignOutSnippet>
       public function destroy(Request $request)
       {
          // Determine whether signon Azure or local database
          if (empty(session('accessToken'))) {
            $back_url = ('/');
          } else {
            $back_url = env('OAUTH_AUTHORITY')."/oauth2/v2.0/logout?post_logout_redirect_uri=http%3A%2F%2Flocalhost%3A8000%2F";
          }
  
         $tokenCache = new TokenCache();
         $tokenCache->clearTokens();
   
         // same as AuthenticatedSessionController::logout();
         Auth::guard('web')->logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
   

         return redirect( $back_url );
   
         // return redirect('/');
       }
       // </SignOutSnippet>

      private function parseToken ($token) {
        $base64Data = explode(".", $token)[1];
        return json_decode(base64_decode($base64Data));
    }
}
