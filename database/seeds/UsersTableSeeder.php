<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $role = new Role;
        $role->name = "Admin";
        $role->url = Str::slug("Admin");
        $role->save();

        $role = new Role;
        $role->name = "Autor";
        $role->url = Str::slug("Autor");
        $role->save(); 


        //usuario administrador
        $user = new User;
        $user->role_id = 1;
        $user->name = "abel";
        $user->email = "abel302010@hotmail.com";
        $user->password = bcrypt('abel123');
        $user->image = "default.png";
        $user->about = "lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!";
        $user->save();

        //usuario normal Autor
        $user = new User;
        $user->role_id = 2;
        $user->name = "coy";
        $user->email = "coy302010@hotmail.com";
        $user->password = bcrypt('coy123');
        $user->image = "default.png";
        $user->about = "lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia";
        $user->save();
        
    }
}
