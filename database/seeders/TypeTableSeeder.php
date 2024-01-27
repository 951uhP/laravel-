<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\types;
use Faker\Factory as Faker ;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1 ; $i < 3 ; $i++){
            types::create([
                'name' => $faker->randomElement(['Sinh vien' , 'Thac si', 'Nghien cuu sinh']),
                'description' =>$faker->text
            ]);
        }
    }
}
