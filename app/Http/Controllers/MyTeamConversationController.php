<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyTeamConversationController extends Controller {

    public function index(Request $request) {
        $c = new ConversationController();
        return $c->index($request);
    }
}