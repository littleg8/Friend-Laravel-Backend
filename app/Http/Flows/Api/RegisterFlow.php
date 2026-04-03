<?php

namespace App\Http\Flows\Api;

use App\Events\Api\Register\MemberRegistered;
use App\Http\Services\Api\MemberService;
use App\Http\Services\Common\OtpService;
use App\Models\Member;

class RegisterFlow
{
    public function __construct(
        protected MemberService $memberService,
        protected OtpService $otpService
    ) {
    }

    /**
     * 創建會員流程
     * 
     * @param array $attributes
     * 
     * @return Member
     */
    public function registerProcess(array $attributes): Member
    {
        $member = $this->memberService->create($attributes);

        event(new MemberRegistered(
            $member, 
            $this->otpService->generateOtpCode(), 
            $this->otpService->generateOtpCode()
        ));

        return $member;
    }
}