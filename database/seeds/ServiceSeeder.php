<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        $services = ['wifi', 'piscina', 'parcheggio', 'sauna', 'vista mare', 'portineria'];
        $icons = ['wifi', 'swimming-pool', 'parking', 'hot-tub', 'binoculars', 'concierge-bell'];

        for ($i=0; $i < count($services) ; $i++) {
            $newService= new Service();
            $newService->name = $services[$i];
            $newService->icon = $icons[$i];
            $newService->save();
        }
     }
}
