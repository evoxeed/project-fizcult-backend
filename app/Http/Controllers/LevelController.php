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

    public function level($skill, $level): array
    {
        return 
        [
            'level' => $this->levels[$skill][$level],
        ];
    }

    public function get($skill): array
    {
        if ($skill == 1) {
            return [
                'level' => $this->levels[1][1],
            ];
        }
        elseif($skill=2)
        {
            return [
                'level' => $this->levels[1][2],
            ];
        }
    }

    private $levels = [
        "1" => [
            "1" => [
                'index' => 1,
                'description' => 'Описание уровня',
                'valueMin' => 20,
                'valueMax' => 100,
                'valueName' => 'мин',
                'workouts' => [
                    [
                        'name' => 'Челночный бег 5x20',
                        'description' => 'Перерыв 5 минут',
                        'video' => 'url1'
                    ],
                    [
                        'name' => 'Челночный бег 5x30',
                        'description' => 'Перерыв 5 минут',
                        'video' => 'url2'
                    ],
                    [
                        'name' => 'Бег 1 км',
                        'description' => 'В среднем темпе',
                        'video' => 'url3'
                    ]
                ]
            ],
        "2" => [
            'index' => 2,
            'description' => 'Описание уровня',
            'valueMin' => 18,
            'valueMax' => 20,
            'valueName' => 'мин',
            'workouts' => [
                [
                    'name' => 'Челночный бег 5x20',
                    'description' => 'Перерыв 5 минут',
                    'video' => 'url1'
                ],
                [
                    'name' => 'Челночный бег 5x30',
                    'description' => 'Перерыв 5 минут',
                    'video' => 'url2'
                ],
                [
                    'name' => 'Бег 1 км',
                    'description' => 'В среднем темпе',
                    'video' => 'url3'
                ]
            ]
        ],
        "3" => [
            'index' => 3,
            'description' => 'Описание уровня',
            'valueMin' => 15,
            'valueMax' => 18,
            'valueName' => 'мин',
            'workouts' => [
                [
                    'name' => 'Челночный бег 5x20',
                    'description' => 'Перерыв 5 минут',
                    'video' => 'url1'
                ],
                [
                    'name' => 'Челночный бег 5x30',
                    'description' => 'Перерыв 5 минут',
                    'video' => 'url2'
                ],
                [
                    'name' => 'Бег 1 км',
                    'description' => 'В среднем темпе',
                    'video' => 'url3'
                ]
            ]
        ]
        ],
        "2" => [
            "1" => [
                'index' => 1,
                'description' => 'Описание уровня',
                'valueMin' => 40,
                'valueMax' => 60,
                'valueName' => 'кг',
                'workouts' => [
                    [
                        'name' => 'Жим лежа x8',
                        'description' => 'Перерыв 5 минут',
                        'video' => 'url4'
                    ],
                    [
                        'name' => 'Присяд x16',
                        'description' => 'Перерыв 5 минут',
                        'video' => 'url5'
                    ],
                    [
                        'name' => 'Бег 1 км',
                        'description' => 'В среднем темпе',
                        'video' => 'url3'
                    ]
                ]
            ],
        "2"=>[
            'index' => 2,
            'description' => 'Описание уровня',
            'valueMin' => 60,
            'valueMax' => 80,
            'valueName' => 'кг',
            'workouts' => [
                [
                    'name' => 'Жим лежа x8',
                    'description' => 'Перерыв 5 минут',
                    'video' => 'url4'
                ],
                [
                    'name' => 'Присяд x16',
                    'description' => 'Перерыв 5 минут',
                    'video' => 'url5'
                ],
                [
                    'name' => 'Бег 1 км',
                    'description' => 'В среднем темпе',
                    'video' => 'url3'
                ]
            ]
        ],
        "3"=>[
            'index' => 3,
            'description' => 'Описание уровня',
            'valueMin' => 80,
            'valueMax' => 100,
            'valueName' => 'кг',
            'workouts' => [
                [
                    'name' => 'Жим лежа x8',
                    'description' => 'Перерыв 5 минут',
                    'video' => 'url4'
                ],
                [
                    'name' => 'Присяд x16',
                    'description' => 'Перерыв 5 минут',
                    'video' => 'url5'
                ],
                [
                    'name' => 'Бег 1 км',
                    'description' => 'В среднем темпе',
                    'video' => 'url3'
                ]
            ]
        ]
        ]
    ];

};