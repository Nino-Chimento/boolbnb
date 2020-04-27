@extends('layouts.app')
<!-- script -->
<script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.37.2/maps/maps-web.min.js'></script>

@section('content')
  <div class="container">
     <!-- <a class="btn home" href="{{route('welcome')}}">Home</a> -->
    <div class="row justify-content-center">
      <h1 class="mt-3">{{$flat->title}}</h1>
      <div class="appartament col-12">
        <img class="img-fluid img_width" src="{{$flat->img}}" alt="">
      </div>
    </div>
      <div class="container mt-5">
        <div class="row">
          <div class="col-xs-12 col-md-6">
            <p class="font-weight-bold">{{$flat->summary}}</p>
          </div>
          <div class="col-xs-12 col-md-6">
            <ul class="font-weight-bold">
              <li>{{$flat->title}}</li>
              <li>{{$flat->address}}</li>
              <li>{{$flat->summary}}</li>
              <li>{{$flat->rooms}}</li>
              <li>{{$flat->bathrooms}}</li>
              <li>{{$flat->mq}}</li>
              <li>{{$flat->city}}</li>
            </ul>
          </div>
        </div>
            <div class="row mt-3">
              <div class="col-xs-12 col-md-12">
                <ul class="font-weight-bold option">
                  @foreach ($flat->options as $option)
                    @if ($option->name == "wifi")
                      <li>Wi-Fi</li>
                    @elseif ($option->name == "parking")
                      <li>Parking</li>
                    @elseif ($option->name == "pool")
                      <li>Pool</li>
                    @elseif ($option->name == "reception")
                      <li>Reception</li>
                    @elseif ($option->name == "sauna")
                      <li>Sauna</li>
                    @elseif ($option->name == "sea_view")
                      <li>Sea view</li>
                    @endif
                  @endforeach
                </ul>
              </div>
            </div>
        </div>
      </div>

      <div class="container mt-5">
        <div class="row">
          <div class="col-xs-12 col-md-6">
            <div id="map"></div>
            <div class="cordinate hidden">
              <p class="lat">{{$flat->latitude}}</p>
              <p class="log">{{$flat->longitude}}</p>
            </div>
          </div>

          <div class="col-xs-12 col-md-6">
            <div>
              <label>Nome</label>
              <input class="message_name" type="text">
              <input class="hidden" type="hidden" name="" value="{{$flat->id}}">
              <label for="mail">Email</label>
              <input class="message_mail" type="text" name="mail">
              <textarea class="message_request mt-3" name="request" rows="8" cols="80" placeholder="inserisci il tuo messaggio"></textarea>
            <button id="pippo" class="btn mt-3">Invia</button>
          </div>
          </div>
        </div>
      </div>
    
<script src="{{ asset('js/map.js') }}"></script>
@endsection
