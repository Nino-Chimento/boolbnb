<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>User Id</th>
          <th>Body</th>
          <th>Created At</th>
          <th>Updated At</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$flat->title}}</td>
          <td>{{$flat->address}}</td>
          <td>{{$flat->summary}}</td>
          <td>{{$flat->rooms}}</td>
          <td>{{$flat->bathrooms}}</td>
          <td>{{$flat->mq}}</td>
          <td>{{$flat->city}}</td>
        </tr>        
      </tbody>
    </table>

</body>
</html>
