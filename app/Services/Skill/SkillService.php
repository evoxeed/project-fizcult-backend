<?php

namespace App\Services\Skill;

use App\Models\Skill;
use App\Models\User;

class SkillService
{
    /**
     * @param User $user
     * @return array
     */
    public function getSkillsForUser(User $user): array
    {
        $skills = Skill::with(['levels' => fn($query) => $query->where('energy_type', '=', $user->energy_type)->orderBy('index')])->get();

        return $skills->toArray();
    }
}