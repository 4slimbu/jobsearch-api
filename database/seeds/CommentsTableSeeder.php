<?php

use App\Acme\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        $faker = Faker\Factory::create();

        DB::table('comments')->truncate();

        // Add extra random users
        factory(Comment::class, 50)->create();
        
        
    }
}