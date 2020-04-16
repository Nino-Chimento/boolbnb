@extends('layouts.app')
@section('content')
  <div class="container">
    <a class="btn btn-primary" href="{{(route('admin.flats.create'))}}">Create a new apartment</a>
    <div class="row">
      <h1>Dashboard your appartments</h1>
      {{-- Stampa un errore se non inseriamo dei dati che non rispettino i criteri --}}
      @if($errors->any())
        <h4>{{$errors->first()}}</h4>
      @endif
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>City</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
            <th colspan="3"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($flats as $flat)
            <tr>
              <td>{{$flat->title}}</td>
              <td>{{$flat->address}}</td>
              <td><a class="btn btn-primary" href="{{(route('admin.flats.show', $flat->slug))}}">View</a> </td>
              <td><a class="btn btn-primary" href="{{(route('admin.flats.edit', $flat->slug))}}">Edit</a> </td>
              <td>
                <form action="{{(route('admin.flats.destroy', $flat))}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection