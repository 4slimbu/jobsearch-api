<?php

use App\Acme\Models\Comment;
use App\Acme\Models\Post;
use App\Acme\Models\User;
use Illuminate\Database\Seeder;

class CoreUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('core_users')->truncate();

        DB::table('core_users')->insert(array(
            [
                'first_name' => 'Rameshwor',
                'last_name' => 'Maharjan',
                'email' => 'maharjanrams+1@gmail.com',
                'password' => bcrypt('password'),
                'gender' => 'male',
                'contact_number' => '9983839928',
                'verified' => 1,
                'is_active' => 1,
                'address' => $faker->address,
                'latitude' => $faker->latitude(32, 35),
                'longitude' => $faker->longitude(150, 153)
            ],
            [
                'first_name' => 'Sudip',
                'last_name' => 'Limbu',
                'email' => 'sudip@gmail.com',
                'password' => bcrypt('password'),
                'gender' => 'male',
                'contact_number' => '9938392883',
                'verified' => 1,
                'is_active' => 1,
                'address' => $faker->address,
                'latitude' => $faker->latitude(32, 35),
                'longitude' => $faker->longitude(150, 153)
            ]
        ));

        // Add extra random users
        factory(User::class, 100)->create()->each(function($u) use ($faker) {
            // Add post to 90% of users
            if ($faker->boolean(90)) {

                // Add 0-5 posts for each user
                for ($i = 0; $i < $faker->randomElement([0, 1, 2, 3, 4, 5]) ; $i++) {
                    $u->posts()->save(factory(Post::class)->make());
                }
            }
        });

        // Add post for default users also
        // Add 50 posts for each user
        for ($i = 0; $i < 50 ; $i++) {
            $user1 = User::where('id', 1)->first();
            $user1->posts()->save(factory(Post::class)->make());

            $user2 = User::where('id', 2)->first();
            $user2->posts()->save(factory(Post::class)->make());
        }

        // Save preferences for each user
        $users = User::select('id')->get();
        $postIds = Post::select('id')->pluck('id');

        foreach ($users as $user) {
            // Save preferences to 90% of users
            if ($faker->boolean(90)) {

                // Save 0-5 preferences for each user
                for ($i = 0; $i < $faker->randomElement([0, 1, 2, 3, 4, 5]) ; $i++) {
                    $user->preferences = [
                        "savedPosts" => $faker->randomElements($postIds, $faker->randomElement([1,2,3,4,5])),
                        "subscribedCategories" => $faker->randomElements($postIds, $faker->randomElement([1,2,3]))
                    ];

                    $user->save();
                }
            }
        }

        // Add comments to posts
        $posts = Post::select('id')->get();
        foreach ($posts as $post) {

            // Add 0-5 comments for each post
            for ($i = 0; $i < $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]) ; $i++) {
                $post->comments()->save(factory(Comment::class)->make([
                    'user_id' => User::all()->random()->id
                ]));
            }
        }

    }
}