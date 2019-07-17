<?php

use App\Acme\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('media')->truncate();

        // Add extra random users
        factory(Media::class, 500)->create();

    }
}