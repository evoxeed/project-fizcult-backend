<?php

namespace App\Http\Response\Formatter;

use App\Models\User;

class UserFormatter
{
    /**
     * @param User $user
     * @return array
     */
    public function format(User $user): array
    {
        return [
            'login' => $user->login,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'created' => $user->created_at->format(API_DATE_FORMAT_DATETIME),
        ];
    }
}
