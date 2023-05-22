<?php

namespace App\Http\Controllers;

use App\Http\Response\Formatter\UserFormatter;
use App\Http\Response\Formatter\LessonsFormatter;
use App\UserInterface;
use Laravel\Lumen\Routing\Controller;
use App\Services\User\AllUserLessonsService;

class SkillController extends Controller
{
    /**
     *
     * 
     */
    public function __construct(
    ) {
    }

    public function get(): array
    {
        return [
            (object) [
                'id' => 1,
                'name' => 'Вынословость'
            ],
            (object) [
                'id' => 2,
                'name' => 'Сила'
            ]
        ];
    }
}