<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function verificationNotice()
    {
        return view('auth.verify-email');
    }

    public function verificationVerify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/');
    }

    public function verificationSend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
