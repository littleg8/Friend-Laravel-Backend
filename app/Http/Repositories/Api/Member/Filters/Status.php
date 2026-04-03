<?php

namespace App\Http\Repositories\Api\Member\Filters;

use App\Http\Repositories\Filters\Where;

class Status extends Where
{
    protected string $column = 'status';
}