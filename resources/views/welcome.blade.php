@extends('layouts.app')


<title>BoolBnb</title>
@section('content')
    </div>
    {{-- barra grande per la ricerca con solo nome o citta  --}}
    <div class="container">
        <div class="row">
          <div class="search_bar form-group text-center col-xs-12">
            <form action="{{route('search')}}" method="get">
              @csrf
              @method('GET')
              <input class="search_width" name="address" type="text" value="" placeholder="Inserisci l'indirizzo">
              <input class="search_width" name="city" type="text" value="" placeholder="Inserisci citta'">
              <input class="search_width" name="ray" type="number" value="" placeholder="Inserisci distanza in Km">
              <button class="btn" type="submit">Vai</button>
            </form>
          </div>
        </div>
      </div>


      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            @foreach ($flats as $key => $flat)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$key + 1}}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="height_img d-block w-100" src="https://www.consul-group.it/wp-content/uploads/2019/02/Come-promesso-ecco-le-3-abilita-segrete-delle-persone-felici.jpg" alt="First slide">
            </div>
            @foreach ($flats as $flat)
            <div class="carousel-item">
                <img class="height_img d-block w-100" src="{{$flat->img}}" alt="Second slide">
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        </a>
    </div>

    <div class="container">
      <div class="row d-flex justify-content-center mt-5 ">
        @foreach ($flats as $flat)
        <a class="card_style" href="{{(route('showflat', $flat->id))}}">
          <div class="card m-2" style="width: 20rem; height: 380px;">
            <img src="{{$flat->img}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-uppercase font-weight-bold">{{$flat->title}}</h5>
              <h6 class="card-address font-weight-light">{{$flat->address}}</h6>
              <p class="card-text text-truncate font-italic">{{$flat->summary}}</p>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </div>



    {{-- wrap per slider img --}}
    {{-- <table class="table">
        <thead>
            <tr>
            <th>Title</th>
            <th>City</th>
            <th>View</th>
            <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($flats as $flat)
            <tr>
                <td>{{$flat->title}}</td>
                <td>{{$flat->address}}</td>
                <td><a class="btn btn-primary" href="{{(route('showflat', $flat->id))}}">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table> --}}

@endsection
