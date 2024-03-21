<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [
          'username' => '佐藤',
          'mail' => 'aiueo@gmail.com',
          'password' => bcrypt('sato123')
        ],
        ]);
    }
}
