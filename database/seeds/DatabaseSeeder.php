<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ResetDatabase::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MedicinalPlant::class);
        $this->call(MemberTableSeeder::class);
        $this->call(RemedyTableSeeder::class);
        $this->call(remedyIngredientsSeeder::class);
        $this->call(StoreTableSeeder::class);
    }
}
