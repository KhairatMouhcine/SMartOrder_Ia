<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendEmailVerificationJob;

class EmailVerificationController extends Controller
{
    public function verify($id)
    {
        $user = User::findOrFail($id);

        if ($user->email_isvalide) {
            return redirect("/")->with('email_already_verified', true);
        }

        $user->email_isvalide = true;
        $user->save();

        Auth::login($user); 

        return redirect("/")->with('email_verified', true);
    }
    public function resend()
{
    $user = Auth::user();

    if ($user->email_isvalide) {
        return redirect()->back()->with('email_already_verified', true);
    }

    // Lancer le job pour renvoyer le mail
    SendEmailVerificationJob::dispatch($user);

    return redirect()->back()->with('verification_resent', true);
}
}
