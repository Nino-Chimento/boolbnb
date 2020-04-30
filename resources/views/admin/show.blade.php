@extends('layouts.app')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
@section('content')
  <div class="container">
    <div class="row">
      <h1>Dettagli appartamento</h1>
      <div class="table-responsive">
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
      </div>

      <div class="container">
        <div class="" style="display: flex; justify-content: space-between; margin-right: 80px">
          <a  class="btn m-3" href="{{route("admin.sponsor",$flat->id)}}">Sponsorizza l'appartamento</a>
          <a  class="btn m-3" href="{{route("admin.flats.index")}}">Tutti gli appartamenti</a>
        </div>
        <img class="img-fluid" style="width:1000px" src="{{asset("storage/".$flat->img)}}" alt="">
      </div>
      </div>
      <div class="row mt-3 ml-3">
        <div class="col-xs-12 col-md-6">
          @foreach ($flat->messages as $message)
            <h3 class="ml-3"style="font-size:28px;">da {{$message->name}}</h3>
            <h6 style="font-size:20px;" class="font-weight-bold ml-3">Email: {{$message->email}}</h6>
            <h6 style="font-size:20px;" class="ml-3 mt-1 font-weight-bold">Messaggio Ricevuto:</h6>
            <div class="graphic_style ml-3 border border-dark" style="">
              <h6 class="p-2 ">{{$message->message}}</h6>
            </div>
          @endforeach
        </div>
        <div class="grafico col-xs-12 col-md-6 mt-3">
            <canvas class="" id="myChart" width="400" height="400"></canvas>
            <h6 class="text-center m-4 font-weight-bold" style="font-size:26px;">Statistiche Visualizzazioni</h6>
        </div>
      </div>
    </div>
  <script src="{{asset("js/graphic.js")}}"></script>
@endsection
