<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs =  [
            [
                'name' => 'Frontennd'
            ],
            [
                'name' => 'Backend'
            ],
            [
                'name' => 'Data Analyst'
            ],
            [
                'name' => 'Project Manager'
            ],
            [
                'name' => 'Quality Assurance'
            ],
            [
                'name' => 'Software Engineer'
            ],
            [
                'name' => 'Fullstack Developer'
            ],
            [
                'name' => 'Network Engineer'
            ]
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}
