@extends('layouts/app')

@section('content')
    <main>

        <h1 class="text-light text-center mt-5">Edit Actor</h1>
        @if ($errors->any())
            <ul>
                @foreach ($errors as $error)
                    <li> <p class="text-light">{{ $error }}</p> </li>
                @endforeach
            </ul>
        @endif
        <section class="container pb-5">
            <form action="{{ url('actor/'.$actor->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
               
                @csrf

                <input type="hidden" name="hiddenId" value="{{ $actor->id }}">

                <label class="text-light" for="imageActor">Photo</label>
                <img class="d-block mb-3 mt-3" src='{{ asset('images/' . $actor->imageActor) }}' alt=""
                    id="imagePreview" style='height: 10vh'>
                <input type="hidden" name="hiddenImageActor" value="{{ $actor->imageActor }}">
                <input class="form-control" type="file" name="imageActor" accept="image/*" onchange="showFile(event)">

                <label class="text-light" for="name">Name Actor</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $actor->name }}">

                <label class="text-light" for="dateActor">Date of birth</label>
                <input class="form-control" type="date" name="dateActor" id="dateActor"
                    value="{{ $actor->date_of_birth }}">

                <div class="d-grid gap-2">
                    <button class="btn btn-primary mt-5" type="submit">Edit</button>
                </div>
            </form>

        </section>
    </main>
    <script>
        function showFile(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('imagePreview');
                output.src = dataURL;
            }
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection
