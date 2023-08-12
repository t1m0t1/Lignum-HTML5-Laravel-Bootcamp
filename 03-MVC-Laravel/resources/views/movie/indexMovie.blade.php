@extends('layout/template')

@section('title','Movies')
    
@section('content')


<main>
    <h1 class="text-light text-center mt-5">Movies</h1>
    <section class="container d-table">
        <a href="{{url('movie/create')}}" class="position-absloute top-0 ms-5 translate-middle btn btn-primary">Create Movie</a>
        
        <table class="table" style="opacity: 80%">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Title</th>
                <th scope="col">Year</th>
                <th scope="col">Duration</th>
                <th scope="col">Synopsis</th>
                <th scope="col">Main actor</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr class="align-middle">
                <td><img class="img-responsive" src='{{ asset ('images/movies/'.$movie->imageMovie)}} 'alt="" style='height: 10vh'></td>
                <td> {{$movie->title}} </td>
                <td> {{$movie->year}} </td>
                <td> {{$movie->duration}} </td>
                <td> {{$movie->synopsis}} </td>
                <td> {{$movie->mainActor->name}} </td>
                <td>
                    <a href={{url('movie/'.$movie->id.'/edit')}} class="btn btn-success mb-3">Edit</a>
                </td>
                <td>
                    <form action="{{url('movie/'.$movie->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>
</section>
</main>
