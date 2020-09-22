<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->delete();

        $tasks = array(
            ['id' => '1', 'project_id' => 1, 'name' => 'Task 1', 'description' => 'This is Task 1 Description!', 'completed' => true, 'slug' => 'task-1', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '2', 'project_id' => 1, 'name' => 'Task 2', 'description' => 'This is Task 2 Description!', 'completed' => true, 'slug' => 'task-2', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '3', 'project_id' => 1, 'name' => 'Task 3', 'description' => 'This is Task 3 Description!', 'completed' => false, 'slug' => 'task-3', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '4', 'project_id' => 1, 'name' => 'Task 4', 'description' => 'This is Task 4 Description!', 'completed' => false, 'slug' => 'task-4', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '5', 'project_id' => 1, 'name' => 'Task 5', 'description' => 'This is Task 5 Description!', 'completed' => true, 'slug' => 'task-5', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '6', 'project_id' => 1, 'name' => 'Task 6', 'description' => 'This is Task 6 Description!', 'completed' => false, 'slug' => 'task-6', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '7', 'project_id' => 2, 'name' => 'Task 7', 'description' => 'This is Task 7 Description!', 'completed' => true, 'slug' => 'task-7', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '8', 'project_id' => 2, 'name' => 'Task 8', 'description' => 'This is Task 8 Description!', 'completed' => true, 'slug' => 'task-8', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '9', 'project_id' => 2, 'name' => 'Task 9', 'description' => 'This is Task 9 Description!', 'completed' => false, 'slug' => 'task-9', 'created_at' => new DateTime(), 'updated_at' => new DateTime()]
        );

        DB::table('tasks')->insert($tasks);
    }
}
