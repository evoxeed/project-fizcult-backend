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
                'name' => 'Вынословость',
                'valueName' => 'мин',
                'levels' => [
                    (object) [
                        'index' => 1,
                        'valueMin' => 20,
                        'valueMax' => 100
                    ],
                    (object) [
                        'index' => 2,
                        'valueMin' => 18,
                        'valueMax' => 20
                    ],
                    (object) [
                        'index' => 3,
                        'valueMin' => 15,
                        'valueMax' => 18
                    ]
                ]
            ],
            (object) [
                'id' => 2,
                'name' => 'Сила',
                'valueName' => 'кг',
                'levels' => [
                    (object) [
                        'index' => 1,
                        'valueMin' => 40,
                        'valueMax' => 60
                    ],
                    (object) [
                        'index' => 2,
                        'valueMin' => 60,
                        'valueMax' => 80
                    ],
                    (object) [
                        'index' => 3,
                        'valueMin' => 80,
                        'valueMax' => 100
                    ]
                ]

            ]
        ];
    }
}