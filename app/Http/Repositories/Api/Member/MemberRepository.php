<?php

namespace App\Http\Repositories\Api\Member;

use App\Http\Repositories\Repository;
use App\Models\Member;

class MemberRepository extends Repository
{
    public function __construct(Member $model) {
        $this->model = $model;
    }
}