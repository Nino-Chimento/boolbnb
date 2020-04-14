<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\Flat;
use Faker\Generator as Faker;
class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++) { 

            $idFlat = Flat::inRandomOrder()->first()->id;
            $newMessage = new Message;
            $newMessage->flat_id = $idFlat;
            $newMessage->email = $faker->email();
            $newMessage->name = $faker->name();
            $newMessage->number_phone = $faker->phoneNumber();
            $newMessage->message = $faker->text(50);
            $newMessage->save();
        }
    }
}
