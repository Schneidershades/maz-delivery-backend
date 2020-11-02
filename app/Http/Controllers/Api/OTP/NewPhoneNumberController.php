<?php

namespace App\Http\Controllers\Api\OTP;

use App\Http\Requests\OTP\NewUserPhoneFormRequest;
use App\Http\Controllers\Api\ApiController;
use App\Repositories\Interfaces\PhoneVerificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Log;

class NewPhoneNumberController extends ApiController
{
    private $userRepository;
    private $phoneVerificationRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PhoneVerificationRepositoryInterface $phoneVerificationRepository
    ) {
        $this->userRepository = $userRepository;
        $this->phoneVerificationRepository = $phoneVerificationRepository;
    }

    /**
    * @OA\Post(
    *      path="/api/v1/otp/new-phone-number/",
    *      operationId="resendEmailVerification",
    *      tags={"OTP"},
    *      summary="Send OTP to a new user",
    *      description="Sends an OTP to a new user",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/NewUserPhoneFormRequest")
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

    public function store(NewUserPhoneFormRequest $request)
    {
        $phoneInput = '234'.$request->phone;

        $phone = $this->userRepository->findModelByPhone($phoneInput);

        if ($phone !== null) {
            return $this->errorResponse('This phone number already exists', 409);
        }

        $verifyPhone = $this->phoneVerificationRepository->findModelByPhone($phoneInput);

        if ($verifyPhone != null) {
            $now = $this->phoneVerificationRepository->currentTime();

            $future = $this->phoneVerificationRepository->otpExpiry($verifyPhone);

            if ($now <= $future) {
                return $this->showMessage('An OTP has already been sent via a call. Kindly check your mobile device');
            }

            $status = $this->phoneVerificationRepository->sendOtp($phoneInput);
        }

        $status = $this->phoneVerificationRepository->sendOtp($phoneInput);

        if ($status->api_response == "pending") {
            return $this->showMessage('You will receieve a call with your otp number. Kindly hold on to your mobile device......');
        }

        Log::info($status->api_response);

        return $this->errorResponse('Unable to send otp number. Please try again', 409);
    }
}
