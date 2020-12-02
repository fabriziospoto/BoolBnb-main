<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ApartmentSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(Apartment_ServiceSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(ViewSeeder::class);
    }
}
