<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->delete();
        Skill::create([
            'name' => 'Выносливость',
            'control_value_name' => 'мс'
        ]);
        Skill::create([
            'name' => 'Сила',
            'control_value_name' => 'кг'
        ]);
    }
}