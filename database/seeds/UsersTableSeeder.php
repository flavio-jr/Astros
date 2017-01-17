<?php

use Illuminate\Database\Seeder;
use Astros\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $defaultUser = new User();
        $defaultUser->usr_name = "User";
        $defaultUser->usr_email = "default@user.com";
        $defaultUser->password = bcrypt('default');
        $defaultUser->save();
    }
}
