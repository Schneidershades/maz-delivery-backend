<?php

namespace App\Http\Controllers\Api\OTP\NewUser;

use Illuminate\Http\Request;
use App\Models\PhoneVerification;
use Carbon\Carbon;
use App\Models\User;
use Validator;
use App\Traits\ApiProvider\SMS\NexmoApi;
use App\Http\Controllers\Api\ApiController;
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
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'phone' => 'required|unique:users,phone|string',
        ]);

        $phoneInput = '234'.$request->phone;

        $phone = $this->userRepository->findModelByPhone($phoneInput);
        if($phone !== null){
            return $this->errorResponse('This phone number already exists', 409);
        }


        $verifyPhone = $this->phoneVerificationRepository->findModelByPhone($phoneInput);

        $date = new \DateTime();
        $now = $date->format('Y-m-d H:i:s');        
        $nexmoCode = null;

        if($verifyPhone != null){  

            $future = date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime($verifyPhone->updated_at)));   
            // check the last 1 hours if a token was provided in the last 1 hour and not verified
            if($now <= $future){
                return $this->showMessage('An OTP has already been sent. Kindly check your mobile device');
            }else{
                $status = $this->phoneVerificationRepository->sendOtp($phoneInput);
            }
        }else{
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

        $phone = $this->phoneVerificationRepository->findModelByPhone($phone);

        if($phone != null){
            $future = $this->phoneVerificationRepository->otpExpiry($phone->updated_at);   
            if($now <= $future){
                return $this->showMessage('An OTP has already been sent. Kindly check your mobile device');
            }else{
                $status = $this->phoneVerificationRepository->sendOtp($phone);
            }
        }else{
            $status = $this->phoneVerificationRepository->sendOtp($phone);
        }

        if($status->api_response == "pending"){
            return $this->showMessage('An OTP has been sent. Kindly check your mobile device');
        }else{
            return $this->errorResponse('An error occured. Please try again', 409);
        }
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
