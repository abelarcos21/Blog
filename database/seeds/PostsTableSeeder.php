<?php

use App\Tag;
use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post = new Post;
        $post->title = "Mi primer post";
        $post->url = str_slug("mi primer post");
        $post->body = "lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!
        lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!
        lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!";

        $post->image = "../img/defaul.png";

        $post->view_count = 0;
        $post->status = false;
        $post->is_approved = false;
        $post->user_id = 1;
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 1', 'url' => str_slug("Etiqueta 1")]));
        



        $post = new Post;
        $post->title = "Mi segundo post";
        $post->url = str_slug("mi segundo post");
        $post->body = "lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!
        lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!
        lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!";

        $post->image = "../img/defaul.png";

        $post->view_count = 0;
        $post->status = false;
        $post->is_approved = false;
        $post->user_id = 2;
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 2', 'url' => str_slug("Etiqueta 2")]));


        $post = new Post;
        $post->title = "Mi tercer post";
        $post->url = str_slug("mi tercer post");
        $post->body = "lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!
        lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!
        lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!";

        $post->image = "../img/defaul.png";

        $post->view_count = 0;
        $post->status = false;
        $post->is_approved = false;
        $post->user_id = 2;
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 3', 'url' => str_slug("Etiqueta 3")]));


        $post = new Post;
        $post->title = "Mi cuarto post";
        $post->url = str_slug("mi cuarto post");
        $post->body = "lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!
        lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!
        lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!";

        $post->image = "../img/defaul.png";

        $post->view_count = 0;
        $post->status = false;
        $post->is_approved = false;
        $post->user_id = 2;
        $post->category_id = 1;
        $post->save();


        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 4', 'url' => str_slug("Etiqueta 4")]));

        
        $post = new Post;
        $post->title = "Mi quinto post";
        $post->url = str_slug("mi quinto post");
        $post->body = "lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!
        lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!
        lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor cum,
        consequatur quae voluptatem placeat, hic incidunt nemo praesentium enim ut aliquid
        reprehenderit quas nihil repellendus molestiae exercitationem. Exercitationem, voluptatem quia!";

        $post->image = "../img/defaul.png";

        $post->view_count = 0;
        $post->status = false;
        $post->is_approved = false;
        $post->user_id = 2;
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 5', 'url' => str_slug("Etiqueta 5")]));

    }
}
