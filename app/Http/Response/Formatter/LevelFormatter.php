<?php

namespace App\Http\Response\Formatter;

use App\Models\Level;

class LevelFormatter
{

    private function formatWorkout(array $workout){
        return [
            'name' => $workout['workout_type']['name'],
            'url' => $workout['workout_type']['url'],
            'description' => $workout['description'],
        ];
    }


    /**
     * @param Leve $user
     * @return array
     */
    public function format(Level $level): array
    {
        return [
            'descripton' => $level->description,
            'workouts' => array_map(fn($workout) => $this->formatWorkout($workout),$level->workouts->toArray())
        ];
    }
}