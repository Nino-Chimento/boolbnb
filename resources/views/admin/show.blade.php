@extends('layouts.app')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
@section('content')
  <div class="container">
    <a class="btn m-3" href="{{route('admin.flats.index')}}">Home</a>
    <div class="row">
      <h1>Dettagli appartamento</h1>
      <table class="table text-nowrap">
        <thead>
          <tr>
            <th>Titolo</th>
            <th>Indirizzo</th>
            <th>Descrizione</th>
            <th>Stanze</th>
            <th>Bagni</th>
            <th>Metri Quadrati</th>
            <th>Città</th>
            @foreach ($flat->options as $option)
              @if ($option->name == "wifi")
                <th>Wi-Fi</th>
              @elseif ($option->name == "parking")
                <th>Parcheggio</th>
              @elseif ($option->name == "pool")
                <th>Piscina</th>
              @elseif ($option->name == "reception")
                <th>Reception</th>
              @elseif ($option->name == "sauna")
                <th>Sauna</th>
              @elseif ($option->name == "sea_view")
                <th>Vista Mare</th>
              @endif
            @endforeach
          </tr>
        </thead>
        <thead>
          <tr>
            <td class="hidden">{{$flat->id}}</td>
            <td>{{$flat->title}}</td>
            <td>{{$flat->address}}</td>
            <td>{{$flat->summary}}</td>
            <td>{{$flat->rooms}}</td>
            <td>{{$flat->bathrooms}}</td>
            <td>{{$flat->mq}}</td>
            <td>{{$flat->city}}</td>
            @foreach ($flat->options as $option)
              @if ($flat->options->contains($option->id))
                <td>Yes</td>
              @endif
            @endforeach
          </tr>
        </thead>
      </table>
      <a  class="btn m-3" href="{{route("admin.sponsor",$flat->id)}}">Sponsorizza l'appartamento</a>
      <img src="{{asset("storage/".$flat->img)}}" alt="">
      </div>
      <div class="row">
        <div class="col-6">
          @foreach ($flat->messages as $message)
            <h3>da {{$message->name}}</h3>
            <h6 class="text-weight-bold">Email: {{$message->email}}</h6>
            <h6 class="mt-1">Messaggio:</h6>
            <div class="border border-dark " style="width: 250px; height:100px; border-radius:8px;">
              <h6 class="p-2">{{$message->message}}</h6>
            </div>
          @endforeach
        </div>
        <div class="grafico col-4" style="width: 400px;height:400px;">
            <canvas class="" id="myChart" width="200" height="200"></canvas>
            <h6 class="text-center m-4">Statistiche Visualizzazioni</h6>
        </div>
      </div>
    </div>
  <script src="{{asset("js/graphic.js")}}"></script>
@endsection
