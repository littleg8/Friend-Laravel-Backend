<?php

namespace App\Http\Services;

use App\Concerns\ProxyAsRepository;

abstract class Service
{
    use ProxyAsRepository;

    abstract protected function getProxyRepository();
}