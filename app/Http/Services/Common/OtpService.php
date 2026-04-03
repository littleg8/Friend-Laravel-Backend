<?php

namespace App\Http\Services\Common;

class OtpService
{
    public function __construct() {
    }

    /**
     * Generate a 6-digit OTP code for the given phone number.
     * 
     * @param string $phoneNo The phone number for which to generate the OTP.
     * @return string The generated OTP code.
     */
    public function generateOtpCode(): string
    {
        return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }
}