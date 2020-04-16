<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flat;

class FilterFlatController extends Controller
{
  function distance($lat1, $lon1, $latitude, $longitude, $unit){
            //longitudine e latitudine in radianti
            $theta = $lon1 - $longitude;
            //function Korn Shell che prevede serie di operatori matematici e trigonometrici
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($latitude)) +  cos(deg2rad($lat1)) * cos(deg2rad($latitude)) * cos(deg2rad($theta));
            //calcolo della distanza
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);
            //cambio unità di misura
            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }

  public function filterPosition(Request $request) {
    $data = $request->all();
    $address =  str_replace(' ','&', $data['address']);
    $city =  str_replace(' ','&', $data['city']);
    $url = 'https://api.tomtom.com/search/2/geocode/'.$address.'&'.$city.'.json?limit=1&key=fWpjrvAGyfhbJRWFkaCXPHgnlu9PL5Fp';
    $position = json_decode(file_get_contents($url));
    if(empty($position->results)) {
      return redirect()->back()->with('success');
    }
    $latitude = $position->results[0]->position->lat;
    $longitude = $position->results[0]->position->lon;
    $flats = Flat::All();
    foreach ($flats as $flat) {

    $distance = intval($this->distance($latitude, $longitude, $flat->latitude, $flat->longitude, 'K'));
    //$a = intval($distance);

    dd($distance);
    }
    //dd($latitude);
  }


}
