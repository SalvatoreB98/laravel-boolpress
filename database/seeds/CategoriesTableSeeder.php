<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Sport","Politica", "Auto", "Scienza", "Futuro", "Scuola", "Economia" ];
        foreach($categories as $category){
            $newCategory = new App\Category();
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category);
            $newCategory->save();
        }
    }
}
