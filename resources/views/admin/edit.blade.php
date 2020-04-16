@extends('layouts.app')
@section('content')
  <a href="{{route('admin.flats.index')}}">Home</a>
  <h1>Edit your apartment</h1>
  {{-- Stampa un errore se non inseriamo dei dati che non rispettino i criteri --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action=" {{(!empty($flat)) ? route('admin.flats.update', $flat->slug) : route('admin.flats.store')}}" method='post'>
    {{-- è importante che questi token siano dentro il form --}}
    @csrf
    @if(!empty($flat))
      @method('PATCH')
    @else
      @method('POST')
    @endif
    <h2>{{$flat->title}}</h2>
    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control" type="text" name="title" value="{{$flat->title}}">
    </div>

    <div class="form-group">
      <label for="summary">Description</label>
      <textarea class="form-control" name="summary" id="summary" cols="30" rows="10">{{$flat->summary}}</textarea>
    </div>

    <div class="form-group">
      <label for="rooms">Rooms</label>
      <input class="form-control" type="number" name="rooms" value="{{$flat->rooms}}">
    </div>

    <div class="form-group">
      <label for="address">Address</label>
      <input class="form-control" type="text" name="address" value="{{$flat->address}}">
    </div>

    <div class="form-group">
      <label for="city">City</label>
      <input class="form-control" type="text" name="city" value="{{$flat->city}}">
    </div>

    <div class="form-group">
      <label for="bathrooms">Bathrooms</label>
      <input class="form-control" type="number" name="bathrooms" value="{{$flat->bathrooms}}">
    </div>

    <div class="form-group">
      <label for="mq">Square meters</label>
      <input class="form-control" type="number" name="mq" value="{{$flat->mq}}">
    </div>

      {{-- <div class="form-group">
        <label for="published">published</label>
      <input type="text" name="published" value="{{$flat->published}}">
      <input type="hidden" name="id" value="{{$flat->id}}">
      </div> --}}

    <div class="form-group">
      <label for="published">Public</label>
      <select name="published">
        <option value="0">No</option>
        <option value="1">Si</option>
      </select>
    </div>

    <div class="form-group">
      <label for="options">Additional services</label>
      @foreach ($options as $option)
        <div>
          @if ($option->name == "sea_view")
            <span>sea view</span>
          @else
            <span>{{$option->name}}</span>
          @endif
          <input type="checkbox" name="options[]" value="{{$option->id}}" {{($flat->options->contains($option->id)) ? 'checked' : ''}}>
        </div>
      @endforeach
    </div>
    <button class="btn btn-success" type= "submit">Save</button>
  </form>
@endsection