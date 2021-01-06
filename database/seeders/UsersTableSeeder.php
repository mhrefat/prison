<?php

namespace Database\Seeders;
use App\Models\User;
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
        User::create([
            'name'=>'Md Mahmudul Hossain',
            'role'=>'admin',
            'username'=>'mh',
            'nid'=>'1710317900',
            'age'=>'25',
            'address'=>'House-42,ShonirAkhra, Jatrabari, DHaka',
            'gender'=>'male',
            'email'=>'mh@mail.com',
            'password'=>bcrypt('123')
            
        ]);
    }
}
