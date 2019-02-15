<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		DB::table('accounts')->truncate();
		DB::table('users')->truncate();
		DB::table('companies')->truncate();
		

		$this->call([
			AccountsTableSeeder::class,
			UsersTableSeeder::class,
			CompaniesTableSeeder::class
		]);
    }
}
