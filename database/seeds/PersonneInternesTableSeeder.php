<?php

use Illuminate\Database\Seeder;

class PersonneInternesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Cv\PersonneInterne::class, 200)->create();
    }
}
