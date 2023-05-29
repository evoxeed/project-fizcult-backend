<?php

namespace App\Http\Controllers;

use App\Http\Response\Formatter\LevelFormatter;
use App\UserInterface;
use Laravel\Lumen\Routing\Controller;
use App\Services\Level\LevelService;

class LevelController extends Controller
{

    /**
     *
     * 
     */
    public function __construct(
        private UserInterface $user,
        private LevelFormatter $formatter
    ) {}

    public function level($skill, $level, LevelService $levelService): array
    {
        $level = $levelService->getLevelByIndex($this->user, $level, $skill);
        return [
            'level' => $this->formatter->format($level),
        ];
    }

    public function get($skill, LevelService $levelService): array
    {
        $level = $levelService->getLevelByIndex($this->user, $skill, $skill);
        return $this->formatter->format($level);
    }

    private $levels = [
        "1" => [
            "1" => [
                'index' => 1,
                'description' => 'Описание уровня',
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