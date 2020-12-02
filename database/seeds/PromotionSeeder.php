<?php

use Illuminate\Database\Seeder;
use App\Promotion;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['base', 'standard', 'premium'];
        $price = [2.99, 5.99, 9.99];
        $period = [24, 72, 144];

        for ($i=0; $i < 3; $i++) {
            $newPromotion = new Promotion;
            $newPromotion->promotion_name = $name[$i];
            $newPromotion->price = $price[$i];
            $newPromotion->period = $period[$i];

            $newPromotion->save();
        }
    }
}
