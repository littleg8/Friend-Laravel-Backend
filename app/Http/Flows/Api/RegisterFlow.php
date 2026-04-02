<?php

namespace App\Http\Flows\Api;

use App\Http\Services\Api\MemberService;

class RegisterFlow
{
    public function __construct(public MemberService $memberService) {}

    public function registerProcess(array $attributes)
    {
        return $this->memberService->createMember($attributes);
    }
}