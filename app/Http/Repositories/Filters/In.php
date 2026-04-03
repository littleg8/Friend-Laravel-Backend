<?php

namespace App\Http\Repositories\Filters;

use App\Http\Repositories\Filters\Filter;

abstract class In extends Filter
{
    public function apply($query, $value)
    {
        return $query->whereIn($this->column, $value);
    }
}