<?php

use App\User;
//use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        for ($i = 0; $i < 10; $i++) {
            $newUser = new User;
            $newUser->name = $faker->firstName();
            $newUser->lastname = $faker->lastName();
            /* $newUser->email = $faker->email(); */
            $newUser->email = $newUser->name . '.' . $newUser->lastname . '@gmail.it';

            $newUser->password = Hash::make('esempio');
            /* birthday fake format */
            $newUser->birthday = $faker->date();
            /*  */
            /* $newUser->birthday = new Carbon($newUser->created_at)->toDateTimeString(); */
            /*  */
            /* 'password' => Hash::make($request->newPassword) */
            /*  */
            $newUser->save();
        }
    }
}
