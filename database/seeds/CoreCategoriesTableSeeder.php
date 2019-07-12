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
            0 => 
            array (
                'id' => 1,
                'parent' => 0,
                'name' => 'Room',
                'sort_order' => 1,
                'icon' => 'home',
                'description' => NULL,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent' => 0,
                'name' => 'Job',
                'sort_order' => 2,
                'icon' => 'briefcase',
                'description' => NULL,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'parent' => 0,
                'name' => 'Announcement',
                'sort_order' => 3,
                'icon' => 'volume-up',
                'description' => NULL,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'parent' => 0,
                'name' => 'Sale',
                'sort_order' => 4,
                'icon' => 'dollar',
                'description' => NULL,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'parent' => 0,
                'name' => 'Freebie',
                'sort_order' => 5,
                'icon' => 'free-code-camp',
                'description' => NULL,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'parent' => 0,
                'name' => 'Directory',
                'sort_order' => 6,
                'icon' => 'building',
                'description' => NULL,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}