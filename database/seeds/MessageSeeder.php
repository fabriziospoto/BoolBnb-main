<?php

use App\Apartment;
use App\Message;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        $apartments = Apartment::all();

        for ($i = 0; $i < 100; $i++) {
            $newMessage = new Message;
            $newMessage->apartment_id = $apartments->random()->id;
            $newMessage->name = $faker->name();
            $newMessage->email = $faker->email();
            $newMessage->message_obj = 'Oggetto della mail ' . ($i + 1);
            $newMessage->message_body = $faker->text($maxNbChars = 1000);
            $newMessage->read = $faker->boolean();
            $newMessage->message_date = $faker->dateTimeBetween($startDate = '-1 month', $endDate = 'now', $timezone = null, $format = 'Y-m-d');
            // $newMessage->message_date = Carbon::now('Europe/Rome');

            $newMessage->save();
        };

    }
}
