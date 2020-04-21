@extends('layouts.app')
@section('content')
  <div class="container">
     <a href="{{route('welcome')}}">Home</a>
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
            @foreach ($flat->options as $option)
              @if ($flat->options->contains($option->id))
                <td>Yes</td>
              @endif
            @endforeach
          </tr>
        </thead>
      </table>
    </div>
    <div>

      <label>name</label>
      <input class="message_name" type="text">
      <input class="hidden" type="hidden" name="" value="{{$flat->id}}">
      <label for="mail">mail</label>
      <input class="message_mail" type="text" name="mail">
      <textarea class="message_request" name="request" rows="8" cols="80" placeholder="insert your message"></textarea>
    <button id="pippo">send</button>
  </div>
  </div>
  <div class="prova">

  </div>

@endsection
