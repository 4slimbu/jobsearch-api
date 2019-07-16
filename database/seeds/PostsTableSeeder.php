<?php

use App\Acme\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        $faker = Faker\Factory::create();

        DB::table('posts')->truncate();

        // Add extra random users
        factory(Post::class, 50)->create();
        
        
    }
}