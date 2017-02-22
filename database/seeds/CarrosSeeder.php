<?php

use Illuminate\Database\Seeder;


class CarrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carros = [
            0 =>[
            'nome' => 'gol',
            'placa' => 'hld-0079'],
            1 =>[
                'nome' => 'punto',
                'placa' => 'hld-0079']
        ];
        DB::table('carros')->insert($carros);
    }
}
