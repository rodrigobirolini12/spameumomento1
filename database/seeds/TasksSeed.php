<?php

use Illuminate\Database\Seeder;

class TasksSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            0 =>[
                'nome' => 'dormir',
                'status' => '0'],
            1 =>[
                'nome' => 'bebet',
                'status' => '0']
        ];
        DB::table('tasks')->insert($tasks);
    }
}
