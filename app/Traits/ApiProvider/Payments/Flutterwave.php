<?php

namespace App\Traits\ApiProvider\Payments;

use Illuminate\Support\Facades\Http;

class Flutterwave
{
    public static function credentials($testing_api)
    {
        if ($testing_api == "test") {
            return [
                'public_key' => env('FLUTTERWAVE_TEST_PUBLIC_KEY'),
                'secret_key' => env('FLUTTERWAVE_TEST_SECRET_KEY'),
                'encryption_key' => env('FLUTTERWAVE_TEST_ENCRYPTION_KEY'),
            ];
        }
        if ($testing_api == "live") {
            return [
                'public_key' => env('FLUTTERWAVE_LIVE_PUBLIC_KEY'),
                'secret_key' => env('FLUTTERWAVE_LIVE_SECRET_KEY'),
                'encryption_key' => env('FLUTTERWAVE_LIVE_ENCRYPTION_KEY'),
            ];
        }
    }

    public static function verifyTransaction($reference, $transactionId=null)
    {
        $credentials = Flutterwave::credentials(env('FLUTTERWAVE_MODE'));
        
        $ref = $reference;
        $amount = "";
        $currency = "";

        $response = Http::post('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify', [
            "SECKEY" => $credentials['secret_key'],
            "txref" => $ref
        ]);

        $resp = json_decode($response->body(), true);

        return $resp;
    }
}
