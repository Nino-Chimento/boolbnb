@extends('layouts.app')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
@section('content')
  <div class="container">
    <a href="{{route('admin.flats.index')}}">Home</a>
    <a href="{{route("admin.sponsor",$flat->id)}}">Sponsorizza l'appartamento</a>
    <div class="row">
      <h1>Yours apartments</h1>
      <table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Address</th>
            <th>Description</th>
            <th>Rooms</th>
            <th>Bathrooms</th>
            <th>Square meters</th>
            <th>City</th>
            @foreach ($flat->options as $option)
              @if ($option->name == "wifi")
                <th>Wi-Fi</th>
              @elseif ($option->name == "parking")
                <th>Parking</th>
              @elseif ($option->name == "pool")
                <th>Pool</th>
              @elseif ($option->name == "reception")
                <th>Reception</th>
              @elseif ($option->name == "sauna")
                <th>Sauna</th>
              @elseif ($option->name == "sea_view")
                <th>Sea view</th>
              @endif
            @endforeach
          </tr>
        </thead>
        <thead>
          <tr>
            <td>{{$flat->title}}</td>
            <td>{{$flat->address}}</td>
            <td>{{$flat->summary}}</td>
            <td>{{$flat->rooms}}</td>
            <td>{{$flat->bathrooms}}</td>
            <td>{{$flat->mq}}</td>
            <td>{{$flat->city}}</td>
              @foreach ($flat->messages as $message)
                {{$message->name}}
                {{$message->email}}
                {{$message->message}}
              @endforeach
            @foreach ($flat->options as $option)
              @if ($flat->options->contains($option->id))
                <td>Yes</td>
              @endif
            @endforeach
          </tr>
        </thead>
      </table>
      <img src="{{asset("storage/".$flat->img)}}" alt="">
      </div>
    </div>
    <div class="grafico" style="width: 400px;height: 400px;">
        <canvas id="myChart" width="200" height="200"></canvas>
     </div>
  </div>
  <script src="{{asset("js/graphic.js")}}"></script>
@endsection
