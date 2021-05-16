<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
               'name'=>'Abdq',
               'email'=>'abdq@gmail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('password'),
            ],
            [
               'name'=>'Daffa Radifanka',
               'email'=>'daffaradifanka@gmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('password'),
            ],
            [
                'name'=>'White',
                'email'=>'white@gmail.com',
                 'is_admin'=>'0',
                'password'=> bcrypt('password'),
             ],
        ];
  
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
