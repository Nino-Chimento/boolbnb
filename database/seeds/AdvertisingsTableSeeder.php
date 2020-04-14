<?php

use Illuminate\Database\Seeder;
use App\Advertising;
use App\Flat;
class AdvertisingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 4; $i++) { 
            
            $newAdvertisings = new Advertising;
            $newAdvertisings->name = "standard";
            $newAdvertisings->price = 0;
            $newAdvertisings->hours = 0;
            $newAdvertisings->save();
            $newAdvertisings = new Advertising;
            $newAdvertisings->name = "basic";
            $newAdvertisings->price = 2.99;
            $newAdvertisings->hours = 24;
            $newAdvertisings->save();
            $newAdvertisings = new Advertising;
            $newAdvertisings->name = "silver";
            $newAdvertisings->price = 5.99;
            $newAdvertisings->hours = 72;
            $newAdvertisings->save();
            $newAdvertisings = new Advertising;
            $newAdvertisings->name = "gold";
            $newAdvertisings->price = 9.99;
            $newAdvertisings->hours = 144;
            $newAdvertisings->save();
        }
    }
}
