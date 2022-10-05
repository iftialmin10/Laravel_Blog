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
         //$this->call(UserTableSeeder::class);
         //$this->call(SettingTableSeeder::class);

        factory('App\category', 5)->create();
        factory('App\Post', 40)->create();
    }
}
