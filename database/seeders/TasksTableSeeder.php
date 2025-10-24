<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TasksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'name' => 'Design Homepage',
                'description' => 'Create the main homepage design.',
                'user_id' => 2,
                'project_id' => 1,
                'task_status_id' => 1,
                'deadline' => Carbon::now()->addDays(7),
            ],
            [
                'name' => 'Develop API',
                'description' => 'Develop REST API for the app.',
                'user_id' => 2,
                'project_id' => 2,
                'task_status_id' => 2,
                'deadline' => Carbon::now()->addDays(14),
            ],
        ]);
    }
}
