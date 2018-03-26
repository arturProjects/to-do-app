<?php

use Illuminate\Database\Seeder; 
use App\Modules\Task\Models\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 4; $i++)
        {
            for($j = 1;  $j < 6; $j++)
            {
                Task::create([
                    'id_user' => $i,
                    'alphanumeric' => str_random(25),
                    'description' => str_random(150),
                ]);
            }
        }
    }
}
