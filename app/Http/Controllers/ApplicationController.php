<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Mail\MailShipped;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function store(ApplicationRequest $request)
    {
        $data = $request->validated();
        $application = Application::create($data);
        if (!$application) {
            return response()->json(['success' => false, 'message' => 'Failed to save application']);
        }
        Mail::to('jeffrey@example.com')->send(new MailShipped($application));
        return response()->json(['success' => true, 'message' => 'Form submitted successfully']);
    }
}
