<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function userguide()
    {
        return view('resource.user-guide');
    }
    public function goalsetting()
    {
        $data = [
            [
                'question' => 'What is goal setting?',
                'answer' => 'Goal setting is a process of working towards what you want to do or who you want to be.'
            ],
            [
                'question' => 'Why are goals important?',
                'answer_file' => '2'
            ],
            [
                'question' => 'Elements of effective goals(the Five C’s)',
                'answer_file' => '3'
            ],
            [
                'question' => 'What does a good goal statement look like?',
                'answer_file' => '4'
            ],
            [
                'question' => 'Examples of Work Goals',
                'answer_file' => '5'
            ],
            [
                'question' => 'Examples of Learning Goals',
                'answer_file' => '6'
            ],
            [
                'question' => 'Examples of Career Goals',
                'answer_file' => '7'
            ],
        ];
        return view('resource.goal-setting', compact('data'));
    }
    public function conversations()
    {
         return view('resource.conversations');
    }
    public function contact()
    {
         return view('resource.contact');
    }
}
