<?php

namespace App\Traits\ApiProvider\SMS;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use App\Models\User;
use Carbon\Carbon;
use AfricasTalking\SDK\AfricasTalking;

class AfricastalkingSMS
{
    public static function credentials($testing_api)
    {
        if ($testing_api == "sandbox") {
            $username = 'sandbox'; // use 'sandbox' for development in the test environment
            $apiKey   = '02ce0031fc6d5e1d0c48bf272947f0eb22ac53b36f9b796a76a5cafb5abe4b00'; // use your sandbox app API key for development in the test environment
        }

        if ($testing_api == "production") {
            $username = 'YOUR_USERNAME'; // use 'sandbox' for development in the test environment
            $apiKey   = '02ce0031fc6d5e1d0c48bf272947f0eb22ac53b36f9b796a76a5cafb5abe4b00'; // use your sandbox app API key for development in the test environment
        }
        

        return new AfricasTalking($username, $apiKey);
    }

    public static function sendSMS($to, $message)
    {
        $credential =  AfricastalkingSMS::credentials('sandbox');

        $sms      = $credential->sms();
        // Use the service
        $result   = $sms->send([
            'to'      => $to,
            'message' => $message
        ]);

        dd($result);
    }
}
