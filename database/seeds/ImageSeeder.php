<?php

use App\Apartment;
use App\Image;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all();

        $imgRandom = ['?interior,living&sig=', '?interior,kitchen&sig=', '?interior,bedroom&sig=', '?interior,bathroom&sig=', '?interior,apartment&sig='];

        foreach ($apartments as $apartment) {

            for ($i = 0; $i < 5; $i++) {
                $newImage = new Image;
                $newImage->apartment_id = $apartment->id;
                $newImage->img = 'https://source.unsplash.com/random/800x600/'.$imgRandom[$i].rand(10,50);

                $newImage->save();
            }

        }

    }
}
