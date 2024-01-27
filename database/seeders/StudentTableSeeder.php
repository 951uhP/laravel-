<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\students;
use App\Models\types;
use Faker\Factory as Faker ;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create() ;
        $type = types::pluck('id');
        for($i = 0 ; $i < 50 ; $i++){
            students::create([
                'type_id'=>$type->random(),
                'name' => $faker->name,
                'birthday' =>$faker->dateTimeBetween('-20 year' , '-10 year')->format('Y-m-d'),
                'gender' =>$faker->randomElement(['Nam' , 'Nu']),
                'address' =>$faker->city,
                'phone_number' =>$faker->numerify('0##########'),
                'email' =>$faker->email

            ]);
        }
    }
}
