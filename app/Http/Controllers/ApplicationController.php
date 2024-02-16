<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Mail\MailShipped;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    /**
     * Обработка регистрационной формы
     * Сохранение в таблицу "applications" при успешной отправки на почту
     *
     * @param ApplicationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ApplicationRequest $request)
    {
        $data = $request->all();
        try {
            DB::transaction(function () use ($data) {
                $application = Application::create($data);
                if (!$application) {
                    throw new \Exception('Failed to save application data to database');
                }

                // Получение названия формы участия
                $data['form_litter'] = $this->getParticipationAttribute($data['form']);

                Mail::to('jeffrey@example.com')->send(new MailShipped($data));
            });

            return response()->json(['success' => true, 'message' => 'Form submitted successfully']);
        } catch (\Exception $e) {
            Log::error('Form submission failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to submit form'
            ], 500);
        }
    }

    public function getParticipationAttribute($data)
    {
        switch ($data) {
            case '1':
                return "Доклад + Тезис";
            case '2':
                return "Тезис или Статья";
            case '3':
                return 'Участник конференции молодых учёных "Батпеновские чтения';
            case '4':
                return "Участник выставки ИМН";
            case '5':
            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to submit form'
                ], 500);
        }
    }
}
