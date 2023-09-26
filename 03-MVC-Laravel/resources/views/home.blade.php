@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row">

        @foreach ($movies as $movie)
        <div class="card m-3" style="width: 18rem; opacity: 80%">
            <a class="add-to-favorites" data-movie-id="{{ $movie->id }}">

            
                @if ($favorites->contains($movie->id))
                    <img src="{{asset('images/gold.png')}}" style="height: 2em; padding-left: 90%;">
                @else
                <img src="{{asset('images/grey.png')}}" style="height: 2em; padding-left: 90%;">                
                @endif

            </a>

            <img src={{ asset('images/movies/' . $movie->imageMovie) }} class="card-img-top mt-1" alt="image movie {{
            $movie->title }}">

            <div class="card-body">
                <h5 class="card-title">{{ $movie->title }}</h5>

                <a href="#" class="btn btn-primary">More</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
            $('.add-to-favorites').click(function() {
                var movieId = $(this).data('movie-id');

                $.ajax({
                    url: '/addToFavorites',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        'id':movieId,
                    },
                    dataType: "json",
                    method: "POST",
                    success: (response) => {
                        alert('Movie was successfully added to favorites');
                        location.reload();
                    }


                });

            });
        });
</script>
@endsection