<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name' => 'John Doe',
                'email' => 'johndoe@gmail.com',
                'password' => '123456',
                'profile_pic' => 'ProfilePics\Q4fohpqu6SSWRqi0V2pJr9mSnvMidznB2ZeSOdwf.jpeg',
                'age' => '20',
                'gender' => 'male',
                'matches' => '0',
                'bio' => 'Hello from me!'
            ],
            [
                'name' => 'Johannah Doe',
                'email' => 'johannahdoe@gmail.com',
                'password' => '123456',
                'profile_pic' => 'ProfilePics\zPo3FtHNcruobX8JlfaTzzBXDIdJUSFjciMBGX8v.jpeg',
                'age' => '20',
                'gender' => 'female',
                'matches' => '0',
                'bio' => 'Hello from me!'
            ]
        ]);
    }
}
