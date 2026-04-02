<?php

namespace App\Http\Service;

use App\Concerns\ProxyAsRepository;

abstract class Service
{
    use ProxyAsRepository;

    abstract protected function getProxyRepository();
}