@extends('layouts/app')

@section('content')




<section class="container d-tables">
  <h1 class="text-light text-center mt-5">Movies</h1>

  <div class="mt-3">
    <label class="text-light">Search</label>
    <input class="mb-3" type="text">
  </div>

  <table class="table" style="opacity: 80%;">
    <thead>
      <tr>
        {{-- <th scope="col"></th> --}}
        <th scope="col">Title</th>
        <th scope="col">Year</th>
        <th scope="col">Duration</th>
        <th scope="col">Synopsis</th>
        {{-- <th scope="col">Main actor</th> --}}
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @if ($movies)
      @foreach ($movies as $movie)
      <tr class="align-middle">

        <td> {{ $movie->id }} </td>
        <td> {{ $movie->title }} </td>
        <td> {{ $movie->year}} </td>
        <td> {{ $movie->duration }} </td>
        <td> {{ $movie->synopsis }} </td>
        {{-- <td> {{ $movie->mainActor->name }} </td> --}}
        <td>
          <button class="btn btn-success" data-bs-target="#ModalEdit" data-bs-toggle="modal"
            onclick="editMovie({{$movie->id}})">Edit</button>
        </td>
        <td>
          <button class="btn btn-danger" data-bs-target="#ModalDelete" data-bs-toggle="modal">Delete</button>
        </td>
      </tr>

      @endforeach

      @else


      @if (count($movies)>0)

      @foreach ($movies as $movie)
      <tr class="align-middle">

        <td> {{ $movie->id }} </td>
        <td> {{ $movie->title }} </td>
        <td> {{ $movie->year}} </td>
        <td> {{ $movie->duration }} </td>
        <td> {{ $movie->synopsis }} </td>
        {{-- <td> {{ $movie->mainActor->name }} </td> --}}
        <td>
          <button class="btn btn-success" data-bs-target="#ModalEdit" data-bs-toggle="modal"
          onclick="editMovie({{$movie->id}})">Edit</button>
        </td>
        <td>
          <button class="btn btn-danger" data-bs-target="#ModalDelete" data-bs-toggle="modal">Delete</button>
        </td>
      </tr>

      @endforeach

      @else

      <td>Empty</td>

      @endif



      @endif

    </tbody>
  </table>

  <div wire:ignore.self class="modal fade" id="ModalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content ps-4 pe-4">

        <div class="modal-header">
          <h5 class="modal-title">Edit Movie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>

        <img id="imageMovie" src="" alt="" style=" height: 100%; right: 31em; bottom: auto; position: absolute; ">

        <div class="modal-body">


          <form enctype="multipart/form-data">
            @method('put')

            @csrf

            <input class="form-control" type="file" accept="image/*" onchange="showFile(event)">
           
            <input type="hidden" id="movieID">

            <label for="title">Title</label>
            <input class="form-control" id="title" type="text">
            @error('title') <span class="error">{{ $message }}</span> @enderror

            <label for="year">Year</label>
            <input class="form-control" id="year" type="date">
            @error('year') <span class="error">{{ $message }}</span> @enderror

            <label for="duration">Duration</label>
            <input class="form-control" id="duration" type="text">
            @error('duration') <span class="error">{{ $message }}</span> @enderror

            <label for="synopsis">Synopsis</label>
            <textarea class="form-control" id="synopsis" cols="10" rows="3"></textarea>
            @error('synopsis') <span class="error">{{ $message }}</span> @enderror

            <label for="actorID">Cast</label>

            <ul id="listCast">
              
            </ul>

            <select class="form-control" id="actorID" onchange="addCast()">

              @foreach ($actors as $actor)
              <option value="{{$actor->id}}">{{$actor->name}}</option>
              @endforeach
            </select>

            <div class="d-grid gap-2 mb-2">
              <button class="btn btn-primary mt-5" type="submit">Edit</button>
              <button class="btn btn-secondary mt-1" type="button" data-bs-dismiss="modal">Close</button>
            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

</section>

@endsection