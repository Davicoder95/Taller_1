<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Rinvex\Country\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = Country::all();

        foreach ($countries as $country){
            \DB::table('countries')->insert(
                [
                    'name' => $country->name,
                ]);
        }
    }
}
