<?php

namespace App\Traits\ApiProvider\SMS;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class Tizeti
{
	public static function sendOtp($phoneNumber)
	{
        $curl = curl_init();

        $code = rand(1000, 9999);

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.tizeti.com/developers/v1/wificall/otp",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "phoneNumber=".$phoneNumber."&code=".$code,
		  CURLOPT_HTTPHEADER => array(
		    "Accept: application/json",
		    "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjI5Y2RhNjBmLWI5Y2ItNDU0Yi04ZjE3LWE1MzU0MjNhODU4MCIsImlhdCI6MTU5MDg1MDA1OH0.Xnut4YU-EvmILQoXpC3BsZTVSrTGFnUsjrqG5mLWv2Q",
		    "Content-Type: application/x-www-form-urlencoded",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  return json_decode($response);
		}
	}

	public static function verifyOtp($reference, $otp)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.tizeti.com/developers/v1/wificall/verifyLoginCode?call_id=".$reference,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "code=".$otp,
		  CURLOPT_HTTPHEADER => array(
		    "Accept: application/json",
		    "Accept-Encoding: gzip, deflate",
		    "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjI5Y2RhNjBmLWI5Y2ItNDU0Yi04ZjE3LWE1MzU0MjNhODU4MCIsImlhdCI6MTU5MDg1MDA1OH0.Xnut4YU-EvmILQoXpC3BsZTVSrTGFnUsjrqG5mLWv2Q",
		    "Content-Type: application/x-www-form-urlencoded",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return "cURL Error #:" . $err;
		} else {
		  return json_decode($response);
		}
	}
}