<?php

use Illuminate\Database\Seeder;
use App\Category;
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
        //

        $category = new Category;
        $category->name = 'php';
        $category->url = Str::slug("php");
        $category->save();

        $category = new Category;
        $category->name = 'Laravel';
        $category->url = Str::slug("Laravel");
        $category->save();
    }
}
