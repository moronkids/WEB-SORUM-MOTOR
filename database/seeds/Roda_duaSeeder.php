<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class Roda_duaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $faker = Faker::create();
         	foreach (range(1,20) as $index) {
     	        DB::table('Motors')->insert([
     	            'brand_motor' => $faker->name,
     	            'tipe_motor' => $faker->name,
     	            'nama_motor' => $faker->name,
     	            'tahun_motor' => $faker->name,
     	            'harga_motor' => $faker->randomNumber(2),

     	        ]);
     	}
     }
}
