<?php

use App\Apartment;
use App\View;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ViewSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        $apartments = Apartment::all();

        for ($i = 0; $i < 1000; $i++) {
            $newView = new View;
            $newView->apartment_id = $apartments->random()->id;
            $newView->view_date = $faker->dateTimeBetween($startDate = '-1 week', $endDate = 'now', $timezone = null, $format = 'Y-m-d');

            $newView->save();
        }

    }
}
