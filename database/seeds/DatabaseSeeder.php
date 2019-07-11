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
        DB::table('users')->insert([
            'name' => Str::random(8),
            'email' => Str::random(5).'@765.imas',
            'password' => bcrypt('secret')
        ]);
    }
}
