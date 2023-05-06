<?php

namespace App\Services\Authenticate;

use Illuminate\Support\Str;

class AuthKeyGeneratorService
{
    /**
     * @param int $userId
     * @return string
     */
    public function generateAuthKey(int $userId): string
    {
        return 'u' . $userId . 'r' . md5(Str::random());
    }
}
