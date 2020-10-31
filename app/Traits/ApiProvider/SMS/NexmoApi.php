<?php

namespace App\Traits\ApiProvider\SMS;

use App\Models\User;
use Carbon\Carbon;

class NexmoApi
{
    public static function credentials()
    {
        // Parkit Credentials
        // $basic  = new \Nexmo\Client\Credentials\Basic('fe95fbed', 'U2JI2acPoLMqxZBx');
        // Emmanuel Credentials
        $basic  = new \Nexmo\Client\Credentials\Basic('1d34a436', 'FmYvmR0v0p7177qv');
        return $client = new \Nexmo\Client($basic);
    }

    public static function sendPin($to)
    {
        $client =  NexmoApi::credentials();

        try {
            $verification = $client->verify()->start([
              'number' => $to,
              'brand'  => 'Parkit',
              'code_length'  => '4'
            ]);

            return [
                'status' => true,
                'request_id' => $verification->getRequestId(),
                'message' => "Verification id: " . $verification->getRequestId()
            ];
        } catch (\Nexmo\Client\Exception\Request $e) {
            return [
                'status' => false,
                'request_id' => null,
                'message' => "There was a problem with the request: " . $e->getMessage() . PHP_EOL
            ];
        } catch (\Nexmo\Client\Exception\Server $e) {
            return [
                'status' => false,
                'request_id' => null,
                'message' => "The server encounted an error: " . $e->getMessage() . PHP_EOL
            ];
        } catch (\Http\Client\Exception\RequestException $e) {
            return [
                'status' => false,
                'request_id' => null,
                'message' => "The server encounted an error: " . $e->getMessage() . PHP_EOL
            ];
        }
    }

    public static function checkPin($request_id, $code)
    {
        $client =  NexmoApi::credentials();
        $verification = new \Nexmo\Verify\Verification($request_id);

        try {
            $result = $client->verify()->check($verification, $code);
            return [
                'status' => true,
                'message' => 'Verified'
            ];
        } catch (\Nexmo\Client\Exception\Request $e) {
            return [
                'status' => false,
                'message' => "There was a problem with the request: " . $e->getMessage() . PHP_EOL
            ];
        } catch (\Nexmo\Client\Exception\Server $e) {
            return [
                'status' => false,
                'message' => "The server encounted an error: " . $e->getMessage() . PHP_EOL
            ];
        }
    }

    public static function cancelPin($to, $message)
    {
        $client =  NexmoApi::credentials();
        try {
            $result = $client->verify()->cancel('REQUEST_ID');
            var_dump($result->getResponseData());
        } catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
}
