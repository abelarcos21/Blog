<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //otraforma de registar los seeders
        // $this->call([

        //     CategoriesTableSeeder::class,
        //     UsersTableSeeder::class,
        //     PostsTableSeeder::class

        // ]);
        
        
        //forma de truncar tablas pivotes
        // DB::table('post_tag')->truncate();
        // DB::table('post_user')->truncate();

        $this->truncateTables([
          
            'categories',
            'users',
            'posts',
            'roles',
            'tags',
            
        ]);

        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
      
    }

    public function truncateTables(array $tables){
        foreach($tables as $table){
            DB::table($table)->truncate();
        }


    }






}
