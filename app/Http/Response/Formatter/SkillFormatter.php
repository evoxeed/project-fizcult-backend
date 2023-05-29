<?php

namespace App\Http\Response\Formatter;

use App\Models\Skill;
use App\Models\Level;

class SkillFormatter
{

    private function formatLevel(array $level): object
    {
        return (object)[
            'index' => $level['index'],
            'valueMin' => $level['control_value_min'],
            'valueMax' => $level['control_value_max']
        ];
    }

    private function formatSkill(array $skill): object
    {
        return (object)[
            'id' => $skill['id'],
            'name' => $skill['name'],
            'valueName'=> $skill['control_value_name'],
            'levels' => array_map(fn($level) => $this->formatLevel($level),$skill['levels'])
        ];
    }

    /**
     * @param array $skills
     * @return array
     */
    public function format(array $skills): array
    {
        return array_map(fn($skill)=>$this->formatSkill($skill),$skills);
    }
}