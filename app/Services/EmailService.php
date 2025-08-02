<?php

namespace App\Services;

use App\Mail\SendEmailNotification;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public static function sendEmail($toEmail, $subject, $message)
    {
        $data = [
            'subject' => $subject,
            'message' => $message,
        ];


        Mail::to($toEmail)->send((new SendEmailNotification($data))
            ->from('hoangthang050517@gmail.com', 'Mina Shop'));
    }
}
