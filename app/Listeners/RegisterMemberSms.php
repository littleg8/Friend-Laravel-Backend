<?php

namespace App\Listeners;

use App\Events\Api\Register\MemberRegistered;
use App\Http\Services\Common\SmsService;

class RegisterMemberSms
{
    /**
     * Create the event listener.
     */
    public function __construct(
        protected SmsService $smsService
    ) {
    }

    /**
     * Handle the event.
     */
    public function handle(MemberRegistered $event): void
    {
        $phoneNo = $event->member->phone_no;
        $smsCode = $event->smsCode;

        $this->smsService->send(
            $phoneNo,
            '歡迎加入好友圈！',
            "歡迎加入好友圈！您的驗證碼為：{$smsCode}"
        );
    }
}
