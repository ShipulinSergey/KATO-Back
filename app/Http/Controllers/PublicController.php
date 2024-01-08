<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\MailShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function sendMail(MailRequest $request)
    {
        Mail::to("roo.kato@bk.ru")->send(new MailShipped($request));

        return true;
    }
}
