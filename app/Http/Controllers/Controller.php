<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function respondeWith($result, $message = "Action successful.", $code = 200, $redirect = null ) {
        return $response = [
            'data'    => $result,
            'message' => $message ?? 'SUCCESS',
            'success' => true,
            'status_code' => $code ?? 200,
        ];
        if (!empty($redirect)) {
            $response['redirect'] = $redirect;
        }
        return response()->json($response, $code ?? 200);
    }
}
