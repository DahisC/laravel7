<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\TheInvitation;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|max:3',
            recaptchaFieldName() => recaptchaRuleName()
        ]);

        Mail::to($request->email)->send(new TheInvitation(['formUrl' => 'https://docs.google.com/spreadsheets/d/1ebOvc6ocDCFuGxhSJlisMj-rIZC3OjxnfcHrYYbcMxo/edit?usp=sharing']));

        return redirect('/');

        // $validator = Validator::make($request->all(), [
        //     // 'g-recaptcha-response' => 'recaptcha',
        //     'message' => 'required|max:3'
        //     // OR since v4.0.0
        //     recaptchaFieldName() => recaptchaRuleName()
        // ]);

        // if ($validator->fails()) {
        //     $errors = $validator->errors();
        //     return redirect('/')->withErrors($validator)->withInput();
        // }
    }
}
