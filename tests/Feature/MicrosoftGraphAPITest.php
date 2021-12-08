<?php

namespace Tests\Feature;

use DOMXPath;
use DOMDocument;
use Tests\TestCase;
use App\Models\User;
use Microsoft\Graph\Graph;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class MicrosoftGraphAPITest extends TestCase
{
    Use RefreshDatabase;

    private $loginedInSession, $loginInUser;

    protected function setUp(): void {
       
        parent::setUp();
        $this->loginedInSession = [ 
            'accessToken' => 'eyJ0eXAiOiJKV1QiLCJub25jZSI6InFQR1hUaVFvNm8wT09hS2RQclBWMkRHOTFmQllUaWRidDUxS1BIWk0xb2ciLCJhbGciOiJSUzI1NiIsIng1dCI6Imwzc1EtNTBjQ0g0eEJWWkxIVEd3blNSNzY4MCIsImtpZCI6Imwzc1EtNTBjQ0g0eEJWWkxIVEd3blNSNzY4MCJ9.eyJhdWQiOiIwMDAwMDAwMy0wMDAwLTAwMDAtYzAwMC0wMDAwMDAwMDAwMDAiLCJpc3MiOiJodHRwczovL3N0cy53aW5kb3dzLm5ldC84MjQwMzVkOC04YjgwLTQ2ZTAtOWJhZi0yYTlhZmM1YTE3OGIvIiwiaWF0IjoxNjM4NDc4MjcxLCJuYmYiOjE2Mzg0NzgyNzEsImV4cCI6MTYzODQ4MzAwMywiYWNjdCI6MCwiYWNyIjoiMSIsImFpbyI6IkFTUUEyLzhUQUFBQUt0S1loK0lkcGEyeW51MHppNWJlc2Z3b1BManFkamN5NmlYQ2N0VE13a009IiwiYW1yIjpbInB3ZCJdLCJhcHBfZGlzcGxheW5hbWUiOiJPQ0lPIFBlcmZvcm1hbmNlIERldmVsb3BtZW50IFBTQSIsImFwcGlkIjoiMWE5MGM2M2EtNGIwYy00NGI3LWI1OWEtZDVkNjQ3ZGMzM2YwIiwiYXBwaWRhY3IiOiIxIiwiZmFtaWx5X25hbWUiOiJQb29uIiwiZ2l2ZW5fbmFtZSI6IkphbWVzIiwiaWR0eXAiOiJ1c2VyIiwiaW5fY29ycCI6InRydWUiLCJpcGFkZHIiOiIxOTguMjE3LjExOC4xMjMiLCJuYW1lIjoiUG9vbiwgSmFtZXMiLCJvaWQiOiJhZmY4NGIzYy1hYzUzLTRkODEtOWVkZC1iMTU0YmRlZGUzYmYiLCJvbnByZW1fc2lkIjoiUy0xLTUtMjEtMzY2NzU5ODI2OC0zMDc3MDgxNTM4LTY1Njk4Mzk1Ni0zNjAwMTIiLCJwbGF0ZiI6IjMiLCJwdWlkIjoiMTAwMzIwMDE3NEJCQkFDMSIsInJoIjoiMC5BUmNBMkRWQWdvQ0w0RWFicnlxYV9Gb1hpenJHa0JvTVM3ZEV0WnJWMWtmY01fQVhBRm8uIiwic2NwIjoiQ2FsZW5kYXJzLlJlYWQgQ2FsZW5kYXJzLlJlYWQuU2hhcmVkIENhbGVuZGFycy5SZWFkV3JpdGUgQ2FsZW5kYXJzLlJlYWRXcml0ZS5TaGFyZWQgTWFpbC5TZW5kIG9wZW5pZCBwcm9maWxlIFVzZXIuUmVhZCBVc2VyLlJlYWRCYXNpYy5BbGwgZW1haWwiLCJzaWduaW5fc3RhdGUiOlsiaW5rbm93bm50d2siXSwic3ViIjoiSlZHakVGN1hMWW1nNWtGcnh1aFJ6aWNhNFp4U21ERkF2VmdCTVp5RlZWOCIsInRlbmFudF9yZWdpb25fc2NvcGUiOiJOQSIsInRpZCI6IjgyNDAzNWQ4LThiODAtNDZlMC05YmFmLTJhOWFmYzVhMTc4YiIsInVuaXF1ZV9uYW1lIjoianBvb25AZXh0ZXN0Lmdvdi5iYy5jYSIsInVwbiI6Impwb29uQGV4dGVzdC5nb3YuYmMuY2EiLCJ1dGkiOiJhS0N6MHB4UGtFNnhiQzR6VW4weUFRIiwidmVyIjoiMS4wIiwid2lkcyI6WyJiNzlmYmY0ZC0zZWY5LTQ2ODktODE0My03NmIxOTRlODU1MDkiXSwieG1zX3N0Ijp7InN1YiI6IjQ3ZTk1U2tjNU5fOW05S0pCMzQ1dFNPdFpuVWRpZUdWTHZtSE5HZk93UTAifSwieG1zX3RjZHQiOjE0NDE4NjAxODR9.apgmE0M2_e1ZEFo9X-XIrbCtlN_t5BO4p7Gzd0SRwwWhr_5liSD-dIKFSuvzICBxp9ouxuB22h_hSHiwTmxSpIQ-4UWe9Nz1WNGmJ8YtWwesVa9Rb9oDjqBkV1FKenH4YPHaHZ7d8ycSdEvcEGlZ2kRxH3wWMPV7oo197JqQ5s4Jug5jOJgc3nfiKkRsxpazyU42tbg5ry8Za_4MrIJl0JW8NISD7lkv53HRmDbNqO7Wgx-lDkINIMpHlSLCHUauUSY7KRiuDPrVZNNMgOCbjPeXtyiKkkpOuTKNamjkBcp6bRPsV1YWDePp3SXeBLdb0ozKd58fJoDG0qB6ZoLTtw',
            'refreshToken' => '0.ARcA2DVAgoCL4Eabryqa_FoXizrGkBoMS7dEtZrV1kfcM_AXAFo.AgABAAAAAAD--DLA3VO7QrddgJg7WevrAgDs_wQA9P9uT_VoxFHqIovU_ugcTqHKIdbi3nn13vhkdWfNqFy3JN5ZxPQE_exeRaFyhbQzuFVJcPBbrv86PXRHPeFXi7M8oSg2w3Drlgilcs9mHSqghpWM9JGS6ND3cUJmefL3152thTaOsr3kdb4bLP4JlWIv-yvdQlXu-uYy3uiJx8i3dSSpuFSmHF_6VLW_tT8J9vB3uxUv5WJWmuaYo0oj9pJTmPGyI8YaY_zLkmBgKDqAZtufsbSXqv6iHosIr4ucclB4fvl_2DsnOs9RC5quSw7R7yod7jXUuiOWpQk2WuIdZ-lpzVqfwhB4r3VlaEjmyRpd2ruQUsTmPtLF0txa8q4sng_OZ3M8LYwsrjO4ZMjWPcLXsQD2HtnKZ3GKDz4OXXqGvOfCCyqjUcHCTrmTmsoZfHufvKx8lZMbLtfMKI3ZiJoTLIDkGdi003tNDXO1NzOc4AjluV5cZqFDYciMEVa9FYo-RkAVS_XLgaCI6zYt27rCgU-TC295CCGIxeNZWoFRiKQQUVdhcRAhZFUYIGf5WVqL-k-JnpeCpQoNp90XEP-RKAlbiuNvl7YY5W3mb5x9NzTgKTKYcU3N9Awn2wkpbNlJzTJbqgYccN9m2DpDEgT3d11wAsjkoElAPaqaRGkUBRIGgjcWult2r-6p3SlsRVvVYZGY5gKsZNjjR2mNFL5zhTj-Sywe2vMP-CzowYFReZ3x3EEdXQ5rcc5Ea8P9wDwBJ_uyaC-4CpMqVdldHWCELwp5DlT_Q-dae12nFvI0o7P0xEFuN9iH5nD8jMSRpJoGrzVZqCXog_ZA7b0bq2QicaSRk9Z4GOR19zQQ1KFI9F4x5tDLSBaEgZrKKKUYXcz1EKsSkCyNLqKae3coYirwAZrtsRodJWrdn12oFc5tvHMquWRh7KuP9NGDh0xjHqdRZGDferM3XRJemyu2LDSuyAyvLCULoymD29FLeSfFl21By7mgxOGZPzcMlQ7jZvOKFNj-qniU7n0ORKXLQlBpVaSDTElzwmXeBcpaQzIommGNkEJ2EvI',
            'tokenExpires' => 1630425635,
            'userName' => 'Poon, James',
            'userEmail' => 'jpoon@extest.gov.bc.ca',
            'userTimeZone' => 'Pacific Standard Time',
        ];

        $user = User::firstOrNew(
            ['email' =>  'jpoon@extest.gov.bc.ca'],
            [
                'name' => 'Poon, James',
                'email' => 'jpoon@extest.gov.bc.ca',
                'azure_id' => 'Test',
                'password' => Hash::make('WatchDog'),
            ]
        );
        $user->save();
       
        $this->loginUser = $user;

    }
    
    protected function tearDown(): void 
    {
        $this->loginUser = null;
        $this->loginedInSession = null;
        parent::tearDown();
    }


    /**
     * @test
     */
    public function test_Guest_are_redirect_to_login_page()
    {
        //$response = $this->get('/login');
        $response = $this->withSession($this->loginedInSession)->get('/dashboard');
        $response->assertStatus(302);

        $response = $this->withSession($this->loginedInSession)->get('/conversation/upcoming');
        $response->assertStatus(302);

        $response = $this->withSession($this->loginedInSession)->get('/goal');
        $response->assertStatus(302);

    }


    /**
     * @test
     */
    public function test_logged_in_user_can_see_dashboard_page()
    {
        //$response = $this->get('/login');
        $response = $this->actingAs($this->loginUser)->withSession($this->loginedInSession)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Poon, James');

    }

    public function test_logged_in_user_can_send_email()
    {


        //$response = $this->get('/login');
        $response = $this->actingAs($this->loginUser)->withSession($this->loginedInSession)->get('/graph/sendmail');

        $response->assertStatus(200);

    }




    protected function HTMLToDOM($html)
    {
            // create a document object from the HTML string
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);   // PHP DOMDocument errors/warnings on html5-tags
            $htmlpage = $html;
            $doc->loadHTML( $htmlpage );
            libxml_clear_errors();

            return $doc;
    }



}
