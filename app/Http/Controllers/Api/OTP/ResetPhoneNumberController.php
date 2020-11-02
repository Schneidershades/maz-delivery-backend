<?php

namespace App\Http\Controllers\Api\OTP;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\OTP\ResetPhoneUserPhoneFormRequest;
use App\Repositories\Interfaces\PhoneVerificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class ResetPhoneNumberController extends ApiController
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
    * @OA\Post(
    *      path="/api/v1/otp/reset-phone-number/",
    *      operationId="resendEmailVerification",
    *      tags={"OTP"},
    *      summary="Send OTP to a new user",
    *      description="Sends an OTP to a new user",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ResetPhoneUserPhoneFormRequest")
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

    public function store(ResetPhoneUserPhoneFormRequest $request)
    {
        $phoneInput = '234'.$request->phone;

        $phone = $this->phoneVerificationRepository->findModelByPhone($phoneInput);

        if ($phone != null) {
            $now = $this->phoneVerificationRepository->currentTime();

            $future = $this->phoneVerificationRepository->otpExpiry($phone);

            if ($now <= $future) {
                return $this->showMessage('An OTP has already been sent. Kindly check your mobile device');
            }

            $status = $this->phoneVerificationRepository->sendOtp($phoneInput);
        }

        $status = $this->phoneVerificationRepository->sendOtp($phoneInput);


        if ($status->api_response == "pending") {
            return $this->showMessage('you will receieve a call with your otp number. Kindly hold on to your mobile device......');
        }

        return $this->errorResponse('Unable to send otp number. Please try again', 409);


    }
}
