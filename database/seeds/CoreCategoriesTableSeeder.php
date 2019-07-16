<?php

use Illuminate\Database\Seeder;

class CoreCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('core_categories')->delete();
        
        \DB::table('core_categories')->insert(array (
            [
                'parent' => 0,
                'name' => 'Room',
                'sort_order' => 1,
                'icon' => 'home',
                'description' => NULL,
                'status' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'parent' => 0,
                'name' => 'Job',
                'sort_order' => 2,
                'icon' => 'briefcase',
                'description' => NULL,
                'status' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'parent' => 0,
                'name' => 'Announcement',
                'sort_order' => 3,
                'icon' => 'volume-up',
                'description' => NULL,
                'status' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'parent' => 0,
                'name' => 'Sale',
                'sort_order' => 4,
                'icon' => 'dollar',
                'description' => NULL,
                'status' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'parent' => 0,
                'name' => 'Freebie',
                'sort_order' => 5,
                'icon' => 'free-code-camp',
                'description' => NULL,
                'status' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'parent' => 0,
                'name' => 'Directory',
                'sort_order' => 6,
                'icon' => 'building',
                'description' => NULL,
                'status' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ));
        
        
    }
}