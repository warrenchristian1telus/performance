<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\GoalComment;
use Illuminate\Http\Request;

class GoalCommentController extends Controller
{
    public function delete($id) {
        $goalComment = GoalComment::findOrFail($id);
        if ($goalComment->canBeDeleted()) {
            $goalComment->delete();
        }
        return $this->respondeWith($goalComment);
    }
}
