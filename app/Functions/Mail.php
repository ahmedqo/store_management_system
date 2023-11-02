<?php

namespace App\Functions;

use App\Jobs\MailJob;
use Illuminate\Support\{
    Facades\DB as DB,
    Str,
};
use App\Models\User;


class Mail
{
    public const FORGOT = "FORGOT";

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

        dispatch(new MailJob(Mail::FORGOT, [
            'email' => $user->email,
            'token' => $token,
        ]));
        return true;
    }
}
