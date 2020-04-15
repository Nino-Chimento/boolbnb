<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <div class="container">
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            @endif
        </ul>
    </div>


    <div class="row">
      {{-- <h2>{{Auth::user()->name}}</h2> --}}
      <form action="{{route('admin.flats.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="title">Title</label>
        <input class="form-control" type="text" name="title">
        </div>

        <div class="form-group">
          <label for="summary">Body</label>
          <textarea class="form-control" name="summary" id="summary" cols="30" rows="10">

          </textarea>
        </div>

        <div class="form-group">
            <label for="rooms">rooms</label>
            <input class="form-control" type="number" name="rooms">
          </div>

          <div class="form-group">
            <label for="address">address</label>
            <input class="form-control" type="text" name="address">
          </div>

          <div class="form-group">
            <label for="city">city</label>
            <input class="form-control" type="text" name="city">
          </div>

          <div class="form-group">
            <label for="title">title</label>
            <input class="form-control" type="text" name="title">
          </div>

          <div class="form-group">
            <label for="bathrooms">bathrooms</label>
            <input class="form-control" type="number" name="bathrooms">
          </div>

          <div class="form-group">
            <label for="mq">mq</label>
            <input class="form-control" type="number" name="mq">
          </div>

          <div class="form-group">
            <label for="published">published</label>
            <select name="published">
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="options">options</label>
            @foreach ($options as $option)
          </div>
            <div>
              <span>{{$option->name}}</span>
              <input type="checkbox" name="options[]" value="{{$option->id}}">
            </div>
            @endforeach
  

        
        {{-- <input type="hidden" name="user_id" value="{{Auth::user()->name}}"> --}}
        <button class="btn btn-success" type="submit">Salva</button>
      </form>
    </div>
  </div>
    


    
</body>
</html>