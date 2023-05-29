<?php

namespace App\Services\Level;

use App\Models\Level;
use App\Models\User;

class LevelService
{
    /**
     * @param int $index
     * @param int $skillId
     * @return Level
     */
    public function getLevelByIndex(User $user, int $index, int $skillId): Level
    {
        $level = Level::with('workouts.workoutType')->where('index',$index)->where('skill_id', $skillId)->where('energy_type',$user->energy_type)->first();
        return $level;
    }
}