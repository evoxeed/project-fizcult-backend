<?php

namespace App\Http\Controllers;

use App\Http\Response\Formatter\UserFormatter;
use App\Http\Response\Formatter\LessonsFormatter;
use App\UserInterface;
use Laravel\Lumen\Routing\Controller;
use App\Services\User\AllUserLessonsService;

class LevelController extends Controller
{
    /**
     *
     * 
     */
    public function __construct(
    ) {
    }

    public function get($skill): array
    {
        if ($skill == 1) {
            return [
                'level' => (object) [
                    'id' => 1,
                    'index' => 1,
                    'valueMin' => 20,
                    'valueMax' => 100,
                    'valueName' => 'мин',
                    'workouts' => [
                        (object) [
                            'id' => 1,
                            'name' => 'Челночный бег 5x20',
                            'description' => 'Перерыв 5 минут',
                            'video' => 'url1'
                        ],
                        (object) [
                            'id' => 2,
                            'name' => 'Челночный бег 5x30',
                            'description' => 'Перерыв 5 минут',
                            'video' => 'url2'
                        ],
                        (object) [
                            'id' => 3,
                            'name' => 'Бег 1 км',
                            'description' => 'В среднем темпе',
                            'video' => 'url3'
                        ]
                    ]
                ]
            ];
        }
        elseif($skill=2)
        {
            return [
                'level' => (object) [
                    'id' => 1,
                    'index' => 1,
                    'valueMin' => 40,
                    'valueMax' => 60,
                    'valueName' => 'кг',
                    'workouts' => [
                        (object) [
                            'id' => 4,
                            'name' => 'Жим лежа x8',
                            'description' => 'Перерыв 5 минут',
                            'video' => 'url4'
                        ],
                        (object) [
                            'id' => 5,
                            'name' => 'Присяд x16',
                            'description' => 'Перерыв 5 минут',
                            'video' => 'url5'
                        ],
                        (object) [
                            'id' => 6,
                            'name' => 'Бег 1 км',
                            'description' => 'В среднем темпе',
                            'video' => 'url3'
                        ]
                    ]
                ]
            ];
        }
    }
}