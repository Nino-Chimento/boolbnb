@extends('layouts.app')
@section('content')
  <a href="{{route('admin.flats.index')}}">Home</a>
  <h1>Create a new apartment</h1>
  <div class="container">
    <div class="row">
          {{-- Stampa un errore se non inseriamo dei dati che non rispettino i criteri --}}
          @if($errors->any())
        <h4>{{$errors->first()}}</h4>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{route('admin.flats.store')}}" method="post">
        {{-- è importante che questi token siano dentro il form --}}
        @csrf
        @method('POST')

        <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" type="text" name="title">
        </div>

        <div class="form-group">
          <label for="summary">Description</label>
          <textarea class="form-control" name="summary" id="summary" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
          <label for="rooms">Rooms</label>
          <input class="form-control" type="number" name="rooms">
        </div>

        <div class="form-group">
          <label for="address">Address</label>
          <input class="form-control" type="text" name="address">
        </div>

        <div class="form-group">
          <label for="city">City</label>
          <input class="form-control" type="text" name="city">
        </div>

        <div class="form-group">
          <label for="bathrooms">Bathrooms</label>
          <input class="form-control" type="number" name="bathrooms">
        </div>

        <div class="form-group">
          <label for="mq">Square meters</label>
          <input class="form-control" type="number" name="mq">
        </div>

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
              @if ($option->name == "wifi")
                <span>Wi-Fi</span>
              @elseif ($option->name == "parking")
                <span>Parking</span>
              @elseif ($option->name == "pool")
                <span>Pool</span>
              @elseif ($option->name == "reception")
                <span>Reception</span>
              @elseif ($option->name == "sauna")
                <span>Sauna</span>
              @elseif ($option->name == "sea_view")
                <span>Sea view</span>
              @endif
              <input type="checkbox" name="options[]" value="{{$option->id}}">
            </div>
          @endforeach
        </div>
        <button class="btn btn-success" type="submit">Salva</button>
      </form>
    </div>
  </div>
@endsection