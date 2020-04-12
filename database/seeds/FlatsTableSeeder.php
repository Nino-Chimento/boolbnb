<?php

use Illuminate\Database\Seeder;
use App\Flat;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class FlatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 25; $i++) { 
            
            $userId = User::inRandomOrder()->first()->id;
            $numberOne = rand(1,100);
            $flats = new Flat;

            $flats->user_id = $userId;
            $flats->title = $faker->sentence(5);
            $flats->img = "https://picsum.photos/id/$numberOne/300/200";
            $flats->address = $faker->address;
            $flats->city = $faker->city;
            $flats->latitude = $faker->latitude;
            $flats->longitude = $faker->longitude;
            $flats->slug = Str::slug($flats->title, '-');
            $flats->summary = $faker->text(40);
            $flats->rooms = rand(1,5);
            $flats->bathrooms = rand(1,3);
            $flats->mq = rand(1,120);
            $flats->published = rand(0,1);
            $flats->save();
        }
    }
}
