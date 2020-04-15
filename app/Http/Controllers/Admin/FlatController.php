<?php

namespace App\Http\Controllers\Admin;

use App\Flat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlatController extends Controller
{
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
        
        return view('admin.create');
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
        $data = $request->All();

        $newFlat = new Flat;
        $newFlat->fill($data);
        $newFlat->user_id = $user_id;
        $newFlat->slug = Str::finish(Str::slug($newFlat->title),rand(1, 1000000));
        $newFlat->save();
        $slug = $newFlat->slug;

        return redirect()->route('admin.flats.show', [$slug]);

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
        return view('admin.edit', compact('flat'));

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
        $data= $request->all();
        $flat= Flat::where('slug', $slug)->first();
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
        $flat->delete();
        return redirect()->route('admin.flats.index');
    }
}
