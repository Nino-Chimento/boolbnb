@extends('layouts.app')
@section('content')
  <div class="container" style="height:600px;">
    <h2>Filtra gli appartamenti per opzioni</h2>
    @if (is_string($flatsFilter))
      <h1>{{$flatsFilter}}</h1>
    @endif
    <form class="selezione">
      @foreach($options as $option)
        <label for="{{$option->name}}">{{$option->name}}</label>
        {{-- <input type="checkbox" class="nino" name="checkbox" value=""> --}}
        <input type="checkbox" class="nino" name="chkbox" value="{{$option->name}}" />
      @endforeach
      <label for="rooms">Stanze</label>
    <input type="number" class="rooms" name="formrooms" min="1" max="15" value="">
      <label for="beds">Letti</label>
      <input type="number" class="beds" name="formbeds" min="1" max="15" value="">
      <button type="button" class="btn search" name="button">Cerca</button>
    </form>

    <div class="wrapper d-flex">

      @if(!is_string($flatsFilter))
        @foreach($flatsFilter as $key => $flatfilter)
          {{-- <!-- <ul class="card">
            <li>{{$flatfilter->title}}</li>
            <li>{{$flatfilter->address}}</li>
            <li>{{$flatfilter->city}}</li>
            <li class="htmlrooms">{{$flatfilter->rooms}}</li>
            <li class="htmlbeds">{{$flatfilter->beds}}</li>
            @foreach ($flatsFilter[$key]->options as $option)
            <li class="options">{{$option->name}}</li>
            @endforeach --}}
          {{-- </ul> --> --}}
            <div class="card m-2 mt-4" style="width: 20rem; height: 380px;">
              <img src="{{$flatfilter->img}}" class="card-img-top" alt="...">
              {{-- <img src="{{$flat->img}}" class="card-img-top" alt="..."> --}}
              <div class="card-body">
                <h5 class="card-title text-uppercase font-weight-bold">{{$flatfilter->title}}</h5>
                <h6 class="card-address font-weight-light">{{$flatfilter->address}}</h6>
                <p class="card-text text-truncate font-italic">{{$flatfilter->summary}}</p>
              </div>
            </div>
        @endforeach
      @endif
    </div>
  </div>

    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
@endsection
