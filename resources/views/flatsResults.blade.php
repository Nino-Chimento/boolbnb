<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  @if (is_string($flatsFilter))
    <h1>{{$flatsFilter}}</h1>
  @endif
  <form class="selezione">
    @foreach($options as $option)
      <label for="{{$option->name}}">{{$option->name}}</label>
      {{-- <input type="checkbox" class="nino" name="checkbox" value=""> --}}
      <input type="checkbox" class="nino" name="chkbox" value="{{$option->name}}" />
    @endforeach
    <label for="rooms">Rooms</label>
    <input type="number" class="rooms" name="rooms" min="1" max="15" value="">
    <label for="beds">Beds</label>
    <input type="number" class="beds" name="beds" min="1" max="15" value="">
    <button type="button" class="search" name="button">Cerca</button>
  </form>

  <div class="wrapper d-flex">
    @if(!is_string($flatsFilter))
      @foreach($flatsFilter as $flatfilter)
        <ul class="card">
          <li>{{$flatfilter->title}}</li>
          <li>{{$flatfilter->address}}</li>
          <li>{{$flatfilter->city}}</li>
        </ul>
      @endforeach
    </div>
    @endif
    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
</body>
</html>
