<?php

use App\Apartment;
use App\ApartmentService;
use App\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Apartment_ServiceSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $service = Service::all();
        $apartment = Apartment::all();

        for ($i = 0; $i < 10; $i++) {
            DB::table('apartment_service')->insert([
                'apartment_id' => $apartment[$i]->id,
                'service_id' => rand(3, 4),
            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            DB::table('apartment_service')->insert([
                'apartment_id' => $apartment[$i]->id,
                'service_id' => rand(1, 2),
            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            DB::table('apartment_service')->insert([
                'apartment_id' => $apartment[$i]->id,
                'service_id' => rand(5, 6),
            ]);
        }

    }
}
