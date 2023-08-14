@extends('layouts/app')

@section('content')
    <main>
        <h1 class="text-light text-center mt-5">Create Movie</h1>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        @endif
            <section class="container pb-5">

            <form action="{{ url('movie') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
           
            <label class="text-light" for="imageMovie">Photo</label>
            <img class="d-block mb-3 mt-3" src="" alt="" id="imagePreview" style='height: 10vh'>
            <input class="form-control" type="file" name="imageMovie" accept="image/*" onchange="showFile(event)">
            
            <label class="text-light" for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
            
            <label class="text-light" for="year">Year</label>
            <input  class="form-control" type="date" name="year" id="year" value="{{ old('year') }}">
            
            <label class="text-light" for="duration">Duration</label>
            <input class="form-control" type="text" name="duration" id="duration" value="{{ old('duration') }}">
            
            <label class="text-light" for="synopsis">Synopsis</label>
            <input class="form-control" type="text" name="synopsis" id="synopsis" value="{{ old('synopsis') }}">
            
            <label class="text-light" for="mainActorId">Main Actor</label>
            <select class="form-control" name="mainActorId" id="mainActorId">
                <option value="">Select main actor</option>
                @foreach ($actors as $actor)
                    <option value="{{$actor->id}}">{{$actor->name}}</option>
                @endforeach
            </select>
            <div class="d-grid gap-2">
                <button class="btn btn-primary mt-5" type="submit">Create</button>
            </div>
        </form>
    </section>

    </main>
    <script>
        function showFile(event){
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function (){
                var dataURL = reader.result;
                var output = document.getElementById('imagePreview');
                output.src = dataURL;
            }
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection