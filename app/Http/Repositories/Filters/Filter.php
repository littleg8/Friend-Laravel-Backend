<?php

namespace App\Http\Repositories\Filters;

abstract class Filter
{
    protected string $column;

    abstract public function apply($query, $value);
}