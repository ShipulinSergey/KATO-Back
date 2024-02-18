<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    public function getPaymentCard(PaymentRequest $request)
    {
        $data = $request->validated();

        $pg_merchant_id = env('PAYBOX_MERCHANT_ID');
        $secret_key = env('PAYBOX_MERCHANT_SECRET');
        $request = $requestForSignature = [
            'pg_order_id' => '23',
            'pg_merchant_id'=> $pg_merchant_id,
            'pg_amount' => '25',
            'pg_description' => 'test',
            'pg_salt' => 'molbulak',
            'pg_currency' => 'KZT',
            'pg_check_url' => 'http://site.kz/check',
            'pg_result_url' => 'http://site.kz/result',
            'pg_request_method' => 'POST',
            'pg_success_url' => 'http://site.kz/success',
            'pg_failure_url' => 'http://site.kz/failure',
            'pg_success_url_method' => 'GET',
            'pg_failure_url_method' => 'GET',
            'pg_state_url' => 'http://site.kz/state',
            'pg_state_url_method' => 'GET',
            'pg_site_url' => 'http://site.kz/return',
            'pg_payment_system' => 'EPAYWEBKZT',
            'pg_lifetime' => '86400',
            'pg_user_phone' => '77777777777',
            'pg_user_contact_email' => 'mail@customer.kz',
            'pg_user_ip' => '127.0.0.1',
            'pg_postpone_payment' => '0',
            'pg_language' => 'ru',
            'pg_testing_mode' => '1',
            'pg_user_id' => '1',
            'pg_recurring_start' => '1',
            'pg_recurring_lifetime' => '156',
            'pg_receipt_positions' => [
                [
                    'count' => '1',
                    'name' => 'название товара',
                    'tax_type' => '3',
                    'price' => '900',
                ]
            ],
            'pg_param1' => 'дополнительные данные',
            'pg_param2' => 'дополнительные данные',
            'pg_param3' => 'дополнительные данные',
        ];
        /**
         * Функция превращает многомерный массив в плоский
         */
        function makeFlatParamsArray($arrParams, $parent_name = '')
        {
            $arrFlatParams = [];
            $i = 0;
            foreach ($arrParams as $key => $val) {
                $i++;
                /**
                 * Имя делаем вида tag001subtag001
                 * Чтобы можно было потом нормально отсортировать и вложенные узлы не запутались при сортировке
                 */
                $name = $parent_name . $key . sprintf('d', $i);
                if (is_array($val)) {
                    $arrFlatParams = array_merge($arrFlatParams, makeFlatParamsArray($val, $name));
                    continue;
                }
                $arrFlatParams += array($name => (string)$val);
            }
            return $arrFlatParams;
        }
        // Превращаем объект запроса в плоский массив
        $requestForSignature = makeFlatParamsArray($requestForSignature);
        // Генерация подписи
        ksort($requestForSignature); // Сортировка по ключю
        array_unshift($requestForSignature, 'init_payment.php'); // Добавление в начало имени скрипта
        array_push($requestForSignature, $secret_key); // Добавление в конец секретного ключа
        $request['pg_sig'] = md5(implode(';', $requestForSignature)); // Полученная подпись

        return response()->json(['success' => true, 'message' => 'Payment was successful']);
    }
}
