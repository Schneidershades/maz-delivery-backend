<?php

namespace App\Http\Controllers\Api\OTP;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\OTP\VerifyOtpFormRequest;
use App\Repositories\Interfaces\PhoneVerificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class VerifyOtpController extends ApiController
{
    private $phoneVerificationRepository;

    public function __construct(PhoneVerificationRepositoryInterface $phoneVerificationRepository)
    {
        $this->phoneVerificationRepository = $phoneVerificationRepository;
    }

    /**
    * @OA\Post(
    *      path="/api/v1/otp/verify-otp",
    *      operationId="VerifyOtp",
    *      tags={"OTP"},
    *      summary="Verify Otp",
    *      description="Verify Otp",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/VerifyOtpFormRequest")
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

    public function store(VerifyOtpFormRequest $request)
    {
        $status = $this->phoneVerificationRepository->verifyOtp('234'.$request->phone, $request->otp);

        if ($status->api_response == "verified") {
            return $this->showMessage('The phone number has been verified');
        } else {
            return $this->errorResponse('verification code is might be incorrect or expired. Please try again', 409);
        }
    }
}
