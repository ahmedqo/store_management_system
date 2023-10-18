<?php

namespace App\Functions;

use Illuminate\Support\{
    Facades\Mail as Mailer,
    Facades\DB as DB,
    Str,
};
use App\Models\User;
use App\Mail\Reset as ResetMail;


class Mail
{
    public static function forgot($email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return false;
        }

        $token = Str::random(20);

        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
        ]);

        $mail = new ResetMail(['token' => $token]);

        Mailer::to($user->email)->send($mail);
        return true;
    }
}
