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
  <form class="">
    @foreach ($options as $option)
      <label for="{{$option->name}}">{{$option->name}}</label>
      <input type="checkbox" name="{{$option->name}}" value="{{$option->name}}">
    @endforeach
    <input type="number" name="rooms" min="1" max="10" value="">
    <input type="number" name="beds" min="1" max="50" value="">

  </form>
  <div class="wrapper d-flex">
    @foreach ($flatsFilter as $flatfilter)
      <ul class="card">
        <li>{{$flatfilter->title}}</li>
        <li>{{$flatfilter->address}}</li>
        <li>{{$flatfilter->city}}</li>
      </ul>
    @endforeach
  </div>
</body>
</html>
