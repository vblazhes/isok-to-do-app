<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('projects')->delete();

        $projects = array(
            ['id' => '1', 'name' => 'Project 1', 'description' => 'This is Project 1 Description!', 'slug' => 'project-1', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '2', 'name' => 'Project 2', 'description' => 'This is Project 2 Description!', 'slug' => 'project-2', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '3', 'name' => 'Project 3', 'description' => 'This is Project 3 Description!', 'slug' => 'project-3', 'created_at' => new DateTime(), 'updated_at' => new DateTime()]
        );

        DB::table('projects')->insert($projects);
    }
}
