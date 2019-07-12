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
        $this->call(CommentsTableSeeder::class);
        $this->call(CoreCategoriesTableSeeder::class);
        $this->call(CoreLocationsTableSeeder::class);
        $this->call(CoreLocationTypesTableSeeder::class);
        $this->call(CorePermissionsTableSeeder::class);
        $this->call(CorePermissionRoleTableSeeder::class);
        $this->call(CoreRolesTableSeeder::class);
        $this->call(CoreRoleUserTableSeeder::class);
        $this->call(LogAuditTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(RuntimeConfigTableSeeder::class);
        $this->call(CoreUsersTableSeeder::class);
        $this->call(LogRequestsTableSeeder::class);
    }
}
