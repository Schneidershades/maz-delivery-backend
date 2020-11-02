<?php

namespace App\Http\Controllers\Api\OTP;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\Interfaces\PhoneVerificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class ResetPhoneNumberResendOtpController extends ApiController
{
    private $userRepository;
    private $phoneVerificationRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PhoneVerificationRepositoryInterface $phoneVerificationRepository
    ) {
        $this->middleware(['auth:api']);
        $this->userRepository = $userRepository;
        $this->phoneVerificationRepository = $phoneVerificationRepository;
    }

    /**
    * @OA\Get(
    *      path="/api/v1/otp/reset-phone-number-resend-otp/{phone}",
    *      operationId="resendEmailVerification",
    *      tags={"OTP"},
    *      summary="Send OTP to a new user",
    *      description="Sends an OTP to a new user",
    *      @OA\Parameter(
    *          name="phone",
    *          description="phone number",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=409,
    *          description="Phone number Exists",
    *      ),
    * )
    */
    public function show($phone)
    {
        $user = $this->userRepository->findModelByPhone($phone);

        if ($user !== null) {
            return $this->errorResponse('This phone number already exists', 409);
        }
        $date = new \DateTime();
        $now = $date->format('Y-m-d H:i:s');

        if ($phone != null) {
            $future = $this->phoneVerificationRepository->otpExpiry($phone->updated_at);

            if ($now <= $future) {
                return $this->showMessage('An OTP has already been sent. Kindly check your mobile device');
            }

            $status = $this->phoneVerificationRepository->sendOtp($phone);
        } else {
            $status = $this->phoneVerificationRepository->sendOtp($phone);
        }

        if ($status->api_response == "pending") {
            return $this->showMessage('An OTP has been sent. Kindly check your mobile device');
        }

        return $this->errorResponse('An error occured. Please try again', 409);
    }
}
