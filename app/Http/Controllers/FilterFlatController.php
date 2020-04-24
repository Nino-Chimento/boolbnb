<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Flat;
use App\Option;
use App\View;
use Illuminate\Support\Carbon;

class FilterFlatController extends Controller{

  function welcome() {
    // $flats = Flat::inRandomOrder()->limit(10)->get();
        $flats = Flat::where("published",1);
    
    $flatsSponsor = [];
    foreach ($flats as $flat) {
      
      if(count($flat->advertisings) > 0){
        
         $flatsSponsor[] = $flat;
        }
    }
    foreach ($flatsSponsor as $sponsor) {
      
      if($sponsor->advertisings[0]->price > $flatsSponsor[0]->advertisings[0]->price ){
        // controlliamo il prezzo e se maggiore lo mettiamo in prima posizione
        array_unshift($flatsSponsor, $sponsor);
      }
    }
    
  
    
    $flats = $flatsSponsor;
    for ($i=count($flats); $i <= 10 ; $i++) { 
      $flat = Flat::InRandomOrder()->first();
      if(in_array($flat, $flats)){
        $i--;
      } else{
        $flats[] = $flat;
      }
     
    }

    return view('welcome', compact('flats'));
  }

  public function showflat(Request $request,$id){
   
    $data = $request->session()->all();
    //creiamo un booleano per far partire sempre else in modo da creare la priam volta array con $id
    //
    
    if(isset($data["flats"])){
      if(!in_array($id, $data["flats"])){
         //creiamo un array nella sessione dove mettiamo ogni volta l'id della casa visitata
        $request->session()->push('flats', $id);
        $newView = new View;
        $newView->flat_id = $id;
        $newView->date = Carbon::today()->toDateString();
        
        $newView->save();
      }
      //prima visualizzazione
    }else{
       //creiamo un array nella sessione dove mettiamo ogni volta l'id della casa visitata
      $request->session()->push('flats', $id);
      $newView = new View;
      $newView->flat_id = $id;
      $newView->date = Carbon::today()->toDateString();
      
      $newView->save();
    }
    $flat = Flat::where('id', $id)->first();
    return view('showflat', compact('flat'));

 }

    
    
     


  function distance($lat1, $lon1, $latitude, $longitude, $unit){
            //longitudine e latitudine in radianti
            //angolo ϑ con l'asse x in un piano-xy in coordinate (longitudine e latitudine)
            $theta = $lon1 - $longitude;
            //function Korn Shell che prevede serie di operatori matematici e trigonometrici
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($latitude)) +  cos(deg2rad($lat1)) * cos(deg2rad($latitude)) * cos(deg2rad($theta));
            //calcolo della distanza
            $dist = acos($dist);
            $dist = rad2deg($dist);
            //conversione distanza da radianti in miglia
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
    $ray =  (int)$data['ray'];
    $url = 'https://api.tomtom.com/search/2/geocode/'.$address.'&'.$city.'.json?limit=1&key=fWpjrvAGyfhbJRWFkaCXPHgnlu9PL5Fp';
    $position = json_decode(file_get_contents($url));
    if(empty($position->results)) {
      return redirect()->back()->with('success');
    }
    $latitude = $position->results[0]->position->lat;
    $longitude = $position->results[0]->position->lon;
    $options = Option::All();
    $flats = Flat::All();
    $flatsFilter = [];
    foreach ($flats as $flat) {
    $distance = intval($this->distance($latitude, $longitude, $flat->latitude, $flat->longitude, 'K'));
      if ($ray > $distance) {
        $flatsFilter[] = $flat;
      }
    }
    if (empty($flatsFilter)) {
      $flatsFilter = [
        'flatsFilter'=> 'Non ci sono appartamenti',
        'options'=> $options
      ];
      return view('flatsResults', $flatsFilter);
    }
    $flatsFilter = [
      'flatsFilter' => $flatsFilter,
      'options'=> $options
    ];
      return view('flatsResults', $flatsFilter);
  }
}
