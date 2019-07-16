<?php

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
            ]
        ));

        // Add extra random users
        factory(User::class, 50)->create();

//        factory(App\User::class, 50)->create()->each(function($u) {
//            $u->posts()->save(factory(App\Post::class)->make());
//        });

    }
}