<?php

namespace App\Http\Controllers;
use App\UserMessage;
use Illuminate\Http\Request;

class UserMessageController extends Controller
{
    public function insertform(){
        return back();
    }
    public function addUserMessage(Request $request){
        $phone = $request->input('add_user_phone');
        $first_name = $request->input('add_user_first_name');
        $last_name = $request->input('add_user_last_name');
        $subject = $request->input('add_user_subject');
        $message = $request->input('add_user_message');

        UserMessage::insertGetId([
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone' => $phone,
                'subject' => $subject,
                'message' => $message
            ]);
        return back();
    }
}
