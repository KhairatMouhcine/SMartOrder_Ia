<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $verificationUrl = route('email.verify', ['id' => $this->user->id]); // à sécuriser + tard avec un token

        return $this->subject('Vérifiez votre adresse email')
                    ->view('emails.verify2')
                    ->with([
                        'name' => $this->user->name,
                        'verificationUrl' => $verificationUrl,
                    ]);
    }
}