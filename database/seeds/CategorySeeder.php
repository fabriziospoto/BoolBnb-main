<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['appartamento', 'loft', 'stanza', 'villa'];

        for ($i=0; $i < count($categories) ; $i++) {
            $newCategory= new Category();
            $newCategory->name = $categories[$i];
            $newCategory->save();
        }
    }
}
