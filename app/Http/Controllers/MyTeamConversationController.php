<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyTeamConversationController extends Controller {

    public function templates(Request $request) {
        $c = new ConversationController();
        return $c->templates($request, 'my-team');
    }

    public function index(Request $request) {
        $c = new ConversationController();
        return $c->index($request, 'my-team');
    }
}