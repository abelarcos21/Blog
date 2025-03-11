<?php

use Illuminate\Database\Seeder;
use App\Category;

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
        $category->url = str_slug("php");
        $category->save();

        $category = new Category;
        $category->name = 'Laravel';
        $category->url = str_slug("Laravel");
        $category->save();
    }
}
