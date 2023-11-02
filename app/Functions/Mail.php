<?php

namespace App\Functions;

use App\Mail\{
    Reset as ResetMail,
    Info as InfoMail
};
use Illuminate\Support\{
    Facades\Mail as Mailer,
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

        $mail = new ResetMail(['token' => $token]);
        Mailer::to($user->email)->send($mail);

        return true;
    }

    public static function raw($data)
    {
        Mailer::raw($data['content'], function ($message) use ($data) {
            $message->from($data['from'], $data['name']);
            $message->to($data['to'])->subject($data['subject']);
        });
    }

    public static function info($email, $data)
    {
        $mail = new InfoMail($data);
        Mailer::to($email)->send($mail);
    }
}
