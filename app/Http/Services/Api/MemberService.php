<?php

namespace App\Http\Services\Api;

use App\Concerns\ProxyAsRepository;
use App\Http\Repositories\Api\Member\MemberRepository;
use App\Http\Repositories\Repository;
use App\Http\Service\Service;

class MemberService extends Service
{
    use ProxyAsRepository;

    public function __construct(protected MemberRepository $memberRepository) {
    }

    protected function getProxyRepository(): Repository
    {
        return $this->memberRepository;
    }
}