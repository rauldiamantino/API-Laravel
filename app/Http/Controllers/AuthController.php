<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;

    // 5|YcEDpUeoK5rwJmCp4lLE60wVqujrRgPZoidSCpaf1369161f - invoice
    // 6|YQadlBAgTeMfPS23CwHEVvzHWEydbeN8MKfTmx0Xac63fe32 - user
    // 7|swt0foMS6qzfz44yEpexmBPOkjCQVCNMQfuTaTJife54f184 - teste

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return $this->response('Authorized', 200, [
                'token' => $request->user()->createToken('invoice', ['teste-index'])->plainTextToken,
            ]);
        }

        return $this->response('Not Authorized', 403);
    }

    public function logout()
    {

    }
}
