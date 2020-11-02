<?php

namespace App\Repositories;

use App\Models\PhoneVerification;
use App\Repositories\Interfaces\PhoneVerificationRepositoryInterface;
use App\Traits\ApiProvider\SMS\NexmoApi;
use App\Traits\ApiProvider\SMS\Tizeti;
use Carbon\Carbon;

class PhoneVerificationRepository  extends AbstractRepository implements PhoneVerificationRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(PhoneVerification::class);
    }
    
    public function findModelByPhone($phone)
    {
        return PhoneVerification::where('phone', $phone)->first();
    }


    public function saveModel()
    {
        return new PhoneVerification;
    }


    public function saveOrUpdateFields($phoneNumber, $otpProvider)
    {
        $phone = $this->findModelByPhone($phoneNumber);

        if ($phone == null) {
            $phone = $this->saveModel();
        }

        if ($otpProvider['state'] == 'pending' && $otpProvider['status'] == true) {
            $phone->verified_at = null;
            $phone->api_response = 'pending';
            $phone->verification_code = $otpProvider ? $otpProvider['result'] : null;
        }elseif($otpProvider['state'] == 'verified' && $otpProvider['status'] == true) {
            $phone->verified_at = Carbon::now();
            $phone->api_response = 'verified';
            $phone->verification_code = null;
        }else{
            $phone->api_response = $otpProvider ? $otpProvider['message'] : mt_rand(1000, 9999);
        }

        $phone->phone = $phoneNumber ? $phoneNumber : null;
        $phone->api_provider = $otpProvider ? $otpProvider['provider'] : mt_rand(1000, 9999);
        $phone->save();

        return $phone;
    }

    public function sendOtp($phoneInput)
    {
        return $this->saveOrUpdateFields($phoneInput, $this->otpProvider($phoneInput));
    }

    public function verifyOtp($phoneNumber, $otpRecieved)
    {
        $phone = $this->findModelByPhone($phoneNumber);
        $verify = $this->verifyOtpProvider($phone->verification_code, $otpRecieved);

        return $this->saveOrUpdateFields($phoneNumber, $verify);
    }

    public function otpProvider($phoneInput)
    {
        $otp = Tizeti::sendOtp($phoneInput);
        return [
            'result' => $otp->result,
            'message' => $otp->message,
            'status' => $otp->status,
            'provider' => 'tizeti',
            'state' => 'pending',
        ];
    }

    public function verifyOtpProvider($reference, $otp)
    {
        $otp = Tizeti::verifyOtp($reference, $otp);

        if(property_exists($otp, 'status')){
            return [
                'result' => property_exists($otp, 'result') ? true : false,
                'message' => property_exists($otp, 'result') ? $otp->message : null,
                'status' => property_exists($otp, 'result') ? $otp->status : null,
                'provider' => 'tizeti',
                'state' => 'verified',
            ];
        }else{
            return [
                'result' =>  false,
                'message' => property_exists($otp, 'result') ? $otp->message : null,
                'status' => false,
                'provider' => 'tizeti',
                'state' => 'verified',
            ];
        }  
    }

    public function otpExpiry($phone)
    {
        return date('Y-m-d H:i:s', strtotime('+15 minutes', strtotime($phone->updated_at)));
    }

    public function currentTime()
    {
        $date = new \DateTime();
        return $now = $date->format('Y-m-d H:i:s');
    }
}
