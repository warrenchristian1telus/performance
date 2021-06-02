<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\SocialiteBaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AzureLoginController extends SocialiteBaseController {

    protected $col;
    public function __construct()
    {
        parent::__construct('azure');
        $this->col = $this->provider . '_id';
    }

    public function login()
    {
        return Socialite::driver($this->provider)
            ->scopes(['openid', 'email'])
            ->redirect();
    }

    public function handleCallback() {
        try {

            $user = Socialite::driver($this->provider)->user();
            $isUser = User::where($this->col, $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/dashboard');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    $this->col => $user->id,
                    'password' => ''
                ]);

                Auth::login($createUser);
                return redirect('/dashboard');
            }
        } catch (Exception $exception) {
            abort(500);
        }
    }
}