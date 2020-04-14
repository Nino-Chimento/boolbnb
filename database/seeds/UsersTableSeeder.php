<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use Faker\Generator as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 4; $i++) {
            $newUser = new User;
            $newUser->name = $faker->name();
            $newUser->lastname = $faker->lastName();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make("pippo123");
            $newUser->save();
        }
        

    }
}
