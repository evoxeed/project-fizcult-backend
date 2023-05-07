<?php

namespace App\Http\Controllers;

use App\Http\Response\Formatter\UserFormatter;
use App\UserInterface;
use Laravel\Lumen\Routing\Controller;

class TestController extends Controller
{
    /**
     * @param UserInterface $user
     * @param UserFormatter $formatter
     */
    public function __construct(
        private UserInterface $user,
        private UserFormatter $formatter
    ) {
    }

    public function test(): array
    {
        return [
            'user' => $this->formatter->format($this->user),
            'datetime' => (new \DateTimeImmutable())->format(API_DATE_FORMAT_DATETIME),
        ];
    }
}
