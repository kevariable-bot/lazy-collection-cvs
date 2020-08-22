<?php

use App\LogActivity;
use App\User;
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
        factory(User::class, 1)->create();
        factory(LogActivity::class, 100)->create();
        // $this->call(UserSeeder::class);
    }
}
