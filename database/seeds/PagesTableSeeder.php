<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pages')->delete();
        
        \DB::table('pages')->insert([
            [
                'title' => 'About Us',
                'slug' => 'AboutUs',
                'url' => 'https://expo.io/about'
            ],
            [
                'title' => 'Privacy',
                'slug' => 'Privacy',
                'url' => 'https://expo.io/privacy'
            ],
            [
                'title' => 'Terms And Conditions',
                'slug' => 'TermsAndConditions',
                'url' => 'https://expo.io/terms'
            ],
            [
                'title' => 'Security Tips',
                'slug' => 'SecurityTips',
                'url' => 'https://expo.io/guidelines'
            ],
        ]);
        
        
    }
}