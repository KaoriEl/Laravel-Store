<?php

namespace App\Http\Controllers;
use App\Newsletter;
use Illuminate\Http\Request;

class SubscribeNewsletterController extends Controller
{
    public function insertform(){
        return back();
    }
    public function addNewsletter(Request $request){
        $email = $request->input('add_newsletter');
        Newsletter::insertGetId(
            ['email' => $email, 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')]
        );
        return back();
    }
}
