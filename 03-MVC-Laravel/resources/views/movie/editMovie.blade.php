@extends('layouts/app')

@section('content')
    <main>

        <h1 class="text-light text-center mt-5">Edit Movie</h1>
        @if ($errors->any())
            <ul>
                @foreach ($errors as $error)
                    <li> <p class="text-light">{{ $error }}</p> </li>
                @endforeach
            </ul>
        @endif
        <section class="container pb-5" style="opacity: 80%">
            <form action="{{ url('movie/'.$movie->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
               
                @csrf
                <input type="hidden" name="hiddenId" value="{{ $movie->id }}">
                <input type="hidden" name="hiddenImageMovie" value="{{ $movie->imageMovie }}">

                
                <img class="d-block mb-3 mt-3" src="{{asset('images/movies/'.$movie->imageMovie)}}" alt="" id="imagePreview" style='height: 10vh'>
                <input class="form-control" type="file" name="imageMovie" accept="image/*" onchange="showFile(event)">
                
                <label class="text-light" for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ $movie->title }}">
                
                <label class="text-light" for="year">Year</label>
                <input  class="form-control" type="date" name="year" id="year" value="{{ $movie->year }}">
                
                <label class="text-light" for="duration">Duration</label>
                <input class="form-control" type="text" name="duration" id="duration" value="{{ $movie->duration }}">
                
                <label class="text-light" for="synopsis">Synopsis</label>
                <input class="form-control" type="text" name="synopsis" id="synopsis" value="{{ $movie->synopsis }}">
                
                <label class="text-light" for="mainActorId">Main Actor</label>
                <select class="form-control" name="mainActorId" id="mainActorId">
                    <option value="">Select main actor</option>
                    @foreach ($actors as $actor)
                        <option value="{{$actor->id}}">{{$actor->name}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="hiddenMainActorId" id="hiddenMainActorId" value="{{$movie->mainActorId}}">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary mt-5" type="submit">Edit</button>
                </div>
            </form>

        </section>
        
    </main>

@endsection

