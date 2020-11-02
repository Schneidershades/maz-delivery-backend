<?php

namespace App\Http\Controllers\Api\OTP\ForgotPassword;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Validator;
use App\Traits\ApiProvider\SMS\NexmoApi;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\PhoneVerificationRepositoryInterface;
use App\Http\Requests\OTP\ForgotPasswordFormRequest;

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

    public function store(ForgotPasswordFormRequest $request)
    {
        $phoneInput = '234'.$request->phone;

        $check = $this->userRepository->findModelByPhone($phoneInput);

        if($check == null){
            return $this->errorResponse('This phone number does not exist', 409);
        }

        $verifyPhone = $this->phoneVerificationRepository->findModelByPhone($phoneInput);    

        if($verifyPhone != null){  
            $future = $this->phoneVerificationRepository->otpExpiry($phoneInput);  
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
            return $this->showMessage('An OTP has been sent. Kindly check your mobile device');
        }else{
            return $this->errorResponse('Unable to send otp number. Please try again', 409);
        }
    }

    public function resendOtp($phone)
    {
        $phone = $this->phoneVerificationRepository->findModelByPhone($phone);

        if($check == null){
            return $this->errorResponse('This phone number does not exist', 409);
        }

        if($phone != null){
            $phone->phone = $phone;
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
            return $this->errorResponse('Verification code is might be incorrect or expired. Please try again', 409);
        }
    }
}
