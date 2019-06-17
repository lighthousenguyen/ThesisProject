<?php

use Illuminate\Database\Seeder;

class remedyIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('remedy_ingredients')->truncate();
        DB::table('remedy_ingredients')->insert([
            'remedyId' => 1,
            'medicinalPlantId' => 1,
            'medicinalPlantName' => 'Ngải cứu',
            'dosage'=> '16g'
        ]);
        DB::table('remedy_ingredients')->insert([
            'remedyId' => 1,
            'medicinalPlantId' => 2,
            'medicinalPlantName' => 'Tía tô',
            'dosage'=> '16g'
        ]);
    }
}
