<?php

namespace App\Http\Controllers\Admin;

use App\Flat;
use App\Option;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    private $validationFlatCreate;
    public function __construct(){
        $this->validationFlatCreate = [
            'title'=>"string|max:50|required",
            'address'=>"string|max:50|required",
            'city'=>"string|max:50|required",
            'mq'=>'numeric|required',
            'bathrooms'=>'numeric|max:300|required',
            'rooms'=>'numeric|max:300|required',
            'published'=>'boolean|required',

        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user_id = Auth::id();
        // $flats = Flat::all()->where('user_id', $user_id)->first();
        //abbreviazione chiamata per id
        //controlliamo se l'utente e loggato e mostriamo solo i suoi contenuti
        $auth_id=Auth::id();
        if(empty($auth_id)){
            abort('404','id utente non trovato');
        }
        $flats = Flat::where('user_id', Auth::id())->get();

        return view('admin.index', compact('flats'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options= Option::All();
        return view('admin.create',compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Flat $flat)
    {
        $user_id = Auth::id();
        if(empty($user_id)){
             abort('404',"l'utente non è loggato");
         }
         $request->validate($this->validationFlatCreate);
         $data = $request->All();
         $options= $data['options'];
         if(!empty($options)){
           for ($i=0; $i < count($options); $i++) {
                 $request->validate([
                    $options[$i]=>'exists:App\Option,id'
                ]);
            }
         }
        $address =  str_replace(' ','&', $data['address']);
        $city =  str_replace(' ','&', $data['city']);
        
        $url = 'https://api.tomtom.com/search/2/geocode/'.$address.'&'.$city.'.json?limit=1&key=fWpjrvAGyfhbJRWFkaCXPHgnlu9PL5Fp';
        $position = json_decode(file_get_contents($url));
        if(empty($position->results)) {
          return redirect()->back()->with('success');
        }
        $latitude = $position->results[0]->position->lat;
        $longitude = $position->results[0]->position->lon;
        $newFlat = new Flat;
        $newFlat->fill($data);
        $newFlat->user_id = $user_id;
        $newFlat->latitude = $latitude;
        $newFlat->longitude = $longitude;
        $newFlat->slug = Str::finish(Str::slug($newFlat->title),rand(1, 1000000));

        $newFlat->save();
        if($newFlat->save())
        {
            $newFlat->options()->attach($options);
            $slug = $newFlat->slug;
            return redirect()->route('admin.flats.show', [$slug]);
        }
        else
        {
            // return redirect::back()->withErrors(['msg', 'Problemi di connessione col database']);
            return redirect()->back()->withErrors(['msg', 'Problemi di connessione col database']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $flat = Flat::where('slug', $slug)->first();
        return view('admin.show', compact('flat'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $flat = Flat::where('slug', $slug)->first();
        $options = Option::all();
        $data= [
            'flat'=>$flat,
            'options'=>$options
        ];
        if(empty($flat)){
            abort('404');
        }
        return view('admin.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate($this->validationFlatCreate);
        $data= $request->all();
        $options= $data['options'];

        if(!empty($options)){
            for ($i=0; $i < count($options); $i++) {
                $request->validate([
                    $options[$i]=>'exists:App\Option,id'
                ]);
            }
        }
        $flat= Flat::where('slug', $slug)->first();
        $flat->options()->sync($options);
        $flat->update($data);
        if(!$flat->update()){
            return redirect()->back();
        }
        return redirect()->route('admin.flats.show', [$slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flat $flat)
    {
        if(empty($flat)){
            abort(404);
        }
        $idDetach=[];
        foreach ( $flat->options as $option) {
            $idDetach[]=$option->id;
        }
        $flat->options()->detach();

        $flat->delete();

        $flats = Flat::where('user_id', Auth::id())->get();
        return view('admin.index', compact('flats'));
    }
}
