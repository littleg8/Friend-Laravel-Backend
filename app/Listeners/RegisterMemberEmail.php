<?php

namespace App\Listeners;

use App\Events\Api\Register\MemberRegistered;
use App\Http\Services\Common\SmtpService;

class RegisterMemberEmail
{
    /**
     * Create the event listener.
     */
    public function __construct(
        protected SmtpService $smtpService
    ) {
    }

    /**
     * Handle the event.
     */
    public function handle(MemberRegistered $event): void
    {
        $email = $event->member->mail;
        $smsCode = $event->emailCode;

        $this->smtpService->send(
            $email,
            '歡迎加入好友圈！',
            "歡迎加入好友圈！您的驗證碼為：{$smsCode}"
        );
    }
}
