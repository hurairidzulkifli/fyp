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
        $user= App\User::create([
            'name'=>'HurairiDz',
            'email'=>'kery.dz@gmail.com',
            'password'=>bcrypt('666666'),
            'admin'=>1
        ]);

        App\Profile::create([
            'user_id'=> $user->id,
            'Avatar'=>'/img/uploads/avatars/me.jpg',
            'About'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione est voluptate nesciunt qui repellat doloribus illo praesentium fugiat deserunt earum alias quos eum architecto, voluptas impedit, aliquid odio, et quisquam.
            ',
            'facebook'=>'facebook.com'
        ]);

        return $user;
    }

    
}
