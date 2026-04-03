<?php

namespace App\Http\Repositories\Filters;

use App\Http\Repositories\Filters\Filter;

abstract class Where extends Filter
{
    public function apply($query, $value)
    {
        return $query->where($this->column, $value);
    }
}