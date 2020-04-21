<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class=" full-height">
            <div class="d-flex justify-content-center align-content-center">
                <div class="links">
                     <a class=" " href="{{ url('/') }}">BoolBnB</a>
                </div>

                  @if (Route::has('login'))
                <div class="top-right links">

                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
           {{-- barra grande per la ricerca con solo nome o citta  --}}
            <div class="form-group text-center">
                <form action="{{route('search')}}" method="get">
                    @csrf
                    @method('GET')
                    <input name="address" type="text" value="" placeholder="Inserisci l'indirizzo">
                    <input name="city" type="text" value="" placeholder="Inserisci citta'">
                    <input name="ray" type="number" value="" placeholder="Inserisci distanza in Km">
                    <button type="submit">Vai</button>
                </form>
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
                     <td><a class="btn btn-primary" href="{{(route('showflat', $flat->id))}}">View</a> </td>
                   </tr>
                 @endforeach
               </tbody>
             </table>
           </div>


             {{-- div con casa a card --}}
         </div>
    </body>
</html>
