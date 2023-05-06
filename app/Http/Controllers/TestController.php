<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

class TestController extends Controller
{
    public function test(): array
    {
        return [
            'datetime' => (new \DateTimeImmutable())->format(API_DATE_FORMAT_DATETIME),
        ];
    }
}
