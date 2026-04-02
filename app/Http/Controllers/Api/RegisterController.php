<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Register\RegisterStoreRequest;
use App\Http\Resources\Api\Register\RegisterStoreResource;

class RegisterController extends Controller
{
    public function __construct() {
    }

    public function store(RegisterStoreRequest $request)
    {
        $attributes = $request->validated();

        $member = $this->registerFlow->registerProcess($attributes);

        return new RegisterStoreResource($member);
    }
}