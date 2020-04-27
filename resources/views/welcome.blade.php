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

      <div class="wrapper_jumbo">
        <div class="d-flex justify-content-center">
          <div class="row">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item relative text-center background_image active">
                    <h2 class="h2_title text-center">Vivi un'esperienza indimenticabile</h2>
                    <img class="img_resp" src="https://3.bp.blogspot.com/-oh2M6_vDM7E/VCwCW8Fc2FI/AAAAAAAAItE/RPNNuXo1U9M/s1600/happy-people-2.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item  relative text-center">
                    <h2 class="h2_title text-center">Vivi un'esperienza indimenticabile</h2>
                    <img class="img_resp" src="https://cdn.wallpapersafari.com/32/21/lIXz24.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item relative text-center">
                    <h2 class="h2_title text-center">Vivi un'esperienza indimenticabile</h2>
                    <img class="img_resp" src="https://www.happy-caps.nl/wp-content/uploads/2018/01/energy-e-slider-1600x1000-3.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
          </div>
        </div>
      </div>





    {{-- wrap per slider img --}}
    <table class="table">
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
    </table>

@endsection
