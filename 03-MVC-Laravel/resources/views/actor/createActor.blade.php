@extends('layout/template')

@section('title', 'Create new Actor')

@section('content')
    <main>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        @endif
            <section class="container bg-dark bg-gradient pb-5">

            <form action="{{ url('actor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
            <label class="text-light" for="imageActor">Photo</label>
            <img class="d-block mb-3 mt-3" src="" alt="" id="imagePreview" style='height: 10vh'>
            <input class="form-control" type="file" name="imageActor" accept="image/*" onchange="showFile(event)">
            
            <label class="text-light" for="name">Name Actor</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
            
            <label class="text-light" for="dateActor">Date of birth</label>
            <input  class="form-control" type="date" name="dateActor" id="dateActor" value="{{ old('dateActor') }}">
            <div class="d-grid gap-2">
                <button class="btn btn-primary mt-5" type="submit">Edit</button>
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
