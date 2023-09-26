@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($favorites as $favorite)
                <div class="card m-3" style="width: 18rem; opacity: 80%">
                    
                    <img src={{ asset('images/movies/' . $favorite->movie->imageMovie) }} class="card-img-top mt-1"
                        alt="image movie {{ $favorite->movie->imageMovie}}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $favorite->movie->title }}</h5>

                        <a href="#" class="btn btn-primary">More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
