<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>modifica appartamento</h1>
  {{-- Stampa un errore se non inseriamo dei dati che non rispettino i criteri --}}
 @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
       @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
       @endforeach
      </ul>
  </div>
 @endif
  <form action=" {{(!empty($flat)) ? route('admin.flats.update', $flat->slug) : route('admin.flats.store')}}" method='post'>
      {{-- è importante che questi token siano dentro il form --}}
      @csrf
      @if(!empty($flat))
       @method('PATCH')
       @else
       @method('POST')
      @endif
      <div class="form-group">
        <label for="title">Title</label>
      <input class="form-control" ++type="text" name="title" value="{{$flat->title}}">
      </div>

      <div class="form-group">
        <label for="summary">Body</label>
        <textarea class="form-control" name="summary" id="summary" cols="30" rows="10">
            {{$flat->summary}}
        </textarea>
      </div>

      <div class="form-group">
          <label for="rooms">rooms</label>
          <input class="form-control" type="number" name="rooms" value="{{$flat->rooms}}">
        </div>

        <div class="form-group">
          <label for="address">address</label>
          <input class="form-control" type="text" name="address" value="{{$flat->address}}">
        </div>

        <div class="form-group">
          <label for="city">city</label>
          <input class="form-control" type="text" name="city" value="{{$flat->city}}">
        </div>

        <div class="form-group">
          <label for="bathrooms">bathrooms</label>
          <input class="form-control" type="number" name="bathrooms" value="{{$flat->bathrooms}}">
        </div>

        <div class="form-group">
          <label for="mq">mq</label>
          <input class="form-control" type="number" name="mq" value="{{$flat->mq}}">
        </div>

        <div class="form-group">
          <label for="published">published</label>
        <input type="text" name="published" value="{{$flat->published}}">
        <input type="hidden" name="id" value="{{$flat->id}}">
        </div>
        <button class="btn btn-success" type= "submit" >modifica</button>
    </form>
</body>
</html>
