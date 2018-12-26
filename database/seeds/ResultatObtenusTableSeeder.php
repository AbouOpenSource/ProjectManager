<?php

use Illuminate\Database\Seeder;

class ResultatObtenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


$faker = Faker\Factory::create();






for($u=1;$u<10;$u++)
{
      

for($i=0;$i<10;$i++)
{
      DB::table('resultats_obtenus')->insert([
      'projet_id'=>$u,
      'contenu'=>$faker->text,
      'dateRealisation'=>$faker->dateTime,
      'detailResutltat'=>$faker->text,
      ]);
	
				}






			}
    }
}
