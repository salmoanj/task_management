<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('projects')->insert([
            ['name' => 'Project neymar', 'description' => 'First Sample Project'],
            ['name' => 'Project messi', 'description' => 'Second Sample Project'],
        ]);
    }
}
