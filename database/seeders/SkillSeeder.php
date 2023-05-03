<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills =  [
            [
                'name' => 'SQL'
            ],
            [
                'name' => 'PHP'
            ],
            [
                'name' => 'Javascript'
            ],
            [
                'name' => 'Ruby'
            ],
            [
                'name' => 'Java'
            ],
            [
                'name' => 'Kotlin'
            ],
            [
                'name' => 'Flutter'
            ],
            [
                'name' => 'Go'
            ]
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
