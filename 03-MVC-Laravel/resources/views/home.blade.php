@extends('layout/template')

@section('title', 'Peliculas Chidas')

@section('content')

<main>
    <div class="container mt-5">
        <div class="row">
            @foreach ($movies as $movie) 
            <div class="card m-3" style="width: 18rem; opacity: 80%">
                <img src={{asset('images/movies/'.$movie->imageMovie)}} class="card-img-top mt-1" alt="image movie {{$movie->title}}">
                <div class="card-body">
                  <h5 class="card-title">{{$movie->title}}</h5>
                  
                  <a href="#" class="btn btn-primary">More</a>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</main>