<?php

namespace App\Http\Controllers;

use App\Http\Response\Formatter\SkillFormatter;
use App\Models\Skill;
use App\UserInterface;
//use App\SkillInterface;
use Laravel\Lumen\Routing\Controller;
use App\Services\Skill\SkillService;

class SkillController extends Controller
{
    /**
     * @param SkillInterface $user
     * @param SkillFormatter $formatter
     */
    public function __construct(
        //private SkillInterface $skill,
        private UserInterface $user,
        private SkillFormatter $formatter
    ) {
    }

    public function get(SkillService $skillService): array
    {
        $skills = $skillService->getSkillsForUser($this->user);
        return [
            'skills' => $this->formatter->format($skills),
        ];
    }
}