@extends('layouts.app')
@section('content')
  <div class="container">
    <h1>Modifica Appartamento</h1>
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
    <form action=" {{(!empty($flat)) ? route('admin.flats.update', $flat->slug) : route('admin.flats.store')}}" method='post' enctype="multipart/form-data">
      {{-- è importante che questi token siano dentro il form --}}
      @csrf
      @if(!empty($flat))
        @method('PATCH')
      @else
        @method('POST')
      @endif
      <h2>{{$flat->title}}</h2>
      <div class="form-group font-weight-bold">
        <label for="title">Titolo</label>
        <input class="form-control" value="{{$flat->title}}" type="text" name="title">
      </div>

      <div class="form-group font-weight-bold">
        <label for="summary">Descrizione Appartamento</label>
        <textarea class="form-control" value="{{$flat->summary}}" name="summary" id="summary" cols="30" rows="10"></textarea>
      </div>

      <div class="form-group font-weight-bold">
        <label for="rooms">Stanze</label>
        <input class="form-control" value="{{$flat->rooms}}" type="number" name="rooms">
      </div>

      <div class="form-group font-weight-bold">
        <label for="beds">Letti</label>
        <input class="form-control" value="{{$flat->beds}}" type="number" name="beds">
      </div>

      <div class="form-group font-weight-bold">
        <label for="address">Indirizzo</label>
        <input class="form-control" value="{{$flat->address}}" type="text" name="address">
      </div>

      <div class="form-group font-weight-bold">
        <label for="city">Città</label>
        <input class="form-control" value="{{$flat->city}}" type="text" name="city">
      </div>

      <div class="form-group font-weight-bold">
        <label for="bathrooms">Bagni</label>
        <input class="form-control" value="{{$flat->bathrooms}}" type="number" name="bathrooms">
      </div>

      <div class="form-group font-weight-bold">
        <label for="mq">Metri Quadrati</label>
        <input class="form-control" value="{{$flat->mq}}" type="number" name="mq">
      </div>

      <div class="form-group form_flat">
        <label class="font-weight-bold" for="published">Pubblica</label>
        <select class="btn" name="published">
          <option value="0">No</option>
          <option value="1">Si</option>
        </select>
      </div>
      <div>
         <input type="file" name="img" id="">
      </div>
      <div class="form-group  form-check-inline">
        <label class="m-1" for="options">Servizi Aggiuntivi</label>
        @foreach ($options as $option)
          <div class="p-2 font-weight-bold">
            @if ($option->name == "wifi")
              <span>Wi-Fi</span>
            @elseif ($option->name == "parking")
              <span>Parcheggio</span>
            @elseif ($option->name == "pool")
              <span>Piscina</span>
            @elseif ($option->name == "reception")
              <span>Reception</span>
            @elseif ($option->name == "sauna")
              <span>Sauna</span>
            @elseif ($option->name == "sea_view")
              <span>Vista</span>
            @endif
            <input type="checkbox" name="options[]" value="{{$option->id}}" {{($flat->options->contains($option->id)) ? 'checked' : ''}}>
          </div>
        @endforeach
      </div>
      <button class="btn btn-success" type= "submit">Salva</button>
    </form>
  </div>

@endsection
