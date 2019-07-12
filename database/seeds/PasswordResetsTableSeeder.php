<?php

use Illuminate\Database\Seeder;

class PasswordResetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('password_resets')->delete();
        
        \DB::table('password_resets')->insert(array (
            0 => 
            array (
                'id' => 5,
                'email' => 'responsivesudip@gmail.com',
                'token' => '$2y$10$z3pmYlxBsMQ4NiA30jbzg.OCqLCm6NQVc.dQ1SUuujXxcX1oph1aO',
                'created_at' => '2019-05-14 00:06:45',
            ),
        ));
        
        
    }
}