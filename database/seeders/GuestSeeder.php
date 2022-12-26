<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {
            // Returns always random genders according to the name, inclusive mixed !!
            $gender = $faker->randomElement($array = array('Laki-laki', 'Perempuan'));
            // insert data ke table guests menggunakan Faker
            DB::table('guests')->insert([
                'name' => $faker->firstName($gender),
                'gender' => $gender,
                'address' => $faker->address,
                'description' => $faker->text($maxNbChars = 50),
                'phone' => $faker->phoneNumber,
                'created_at' => $faker->dateTimeThisMonth(),
            ]);
        }
    }
}
