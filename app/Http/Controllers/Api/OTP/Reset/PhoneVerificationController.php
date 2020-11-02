<?php

namespace App\Http\Controllers\Api\OTP\Reset;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\PhoneVerification;
use Validator;
use App\Traits\ApiProvider\SMS\NexmoApi;
use App\Http\Requests\OTP\ResetPhoneUserPhoneFormRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\PhoneVerificationRepositoryInterface;

class PhoneVerificationController extends ApiController
{
    private $userRepository;
    private $phoneVerificationRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PhoneVerificationRepositoryInterface $phoneVerificationRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->phoneVerificationRepository = $phoneVerificationRepository;
        $this->middleware(['auth:api']);
    }

    public function store(ResetPhoneUserPhoneFormRequest $request)
    {
        $phoneInput = '234'.$request->phone;

        $phone = $this->phoneVerificationRepository->findModelByPhone($phoneInput);

        if($phone != null){  

            $future = $this->phoneVerificationRepository->otpExpiry($phone->updated_at);   
            // check the last 1 hours if a token was provided in the last 1 hour and not verified
            if($now <= $future){
                return $this->showMessage('An OTP has already been sent. Kindly check your mobile device');
            }else{
                $status = $this->phoneVerificationRepository->sendOtp($phoneInput);
            }
        }else{
            // return 'new sent';
            $status = $this->phoneVerificationRepository->sendOtp($phoneInput);
        }

        if($status->api_response == "pending"){
            return $this->showMessage('An OTP has been sent. Kindly check your mobile device......');
        }else{
            return $this->errorResponse('Unable to send otp number. Please try again', 409);
        }
    }

    public function resendOtp($phone)
    {
        $user = $this->userRepository->findModelByPhone($phoneInput);

        if($user !== null){
            return $this->errorResponse('This phone number already exists', 409);
        }

        $date = new \DateTime();
        $now = $date->format('Y-m-d H:i:s');        
        $nexmoCode = null;

        if($phone != null){
            $phone->phone = $phone;
            
            // check the last 1 hours if a token was provided in the last 1 hour
            if($phone->updated_at < $formatted_date){
                $nexmoCode = NexmoApi::sendPin($phone);
                $phone->verification_code = $nexmoCode ? $nexmoCode : mt_rand(1000, 9999);
            }
        }else{
            $phone = new PhoneVerification;
            $phone->phone = $phone;
            $nexmoCode = NexmoApi::sendPin($phone);
            $phone->verification_code = $nexmoCode ? $nexmoCode : mt_rand(1000, 9999);
        }

        // return $this->showMessage('An OTP has been sent. Kindly check your mobile device');
        return $this->showMessage('An OTP has been sent. Kindly check your mobile device '. $nexmoCode .' code saved '.$verifyPhone->verification_code);
    }

    public function verifyOtp(Request $request)
    {
        $status = $this->phoneVerificationRepository->verifyOtp($phone->verification_code, $request->otp);

        if($status->api_response == "verified"){
            return $this->showMessage('The phone number has been verified');
        }else{
            return $this->errorResponse('verification code is might be incorrect or expired. Please try again', 409);
        }
    }
}
