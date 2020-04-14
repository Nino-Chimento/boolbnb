<?php

use Illuminate\Database\Seeder;
use App\Option;
use Faker\Generator as Faker;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $newOption = new Option;
       $newOption->name = "wifi";
       $newOption->save();
        $newOption = new Option;
        $newOption->name = "parking";
        $newOption->save();
        $newOption = new Option;
        $newOption->name = "pool";
        $newOption->save();
        $newOption = new Option;
        $newOption->name = "reception";
        $newOption->save();
        $newOption = new Option;
        $newOption->name = "sauna";
        $newOption->save();
        $newOption = new Option;
        $newOption->name = "sea_view";
        $newOption->save();
      
      
      
      
      
    }   
       
}

// "wifi", "parking", "pool", "reception",
//         "sauna", "sea_view"