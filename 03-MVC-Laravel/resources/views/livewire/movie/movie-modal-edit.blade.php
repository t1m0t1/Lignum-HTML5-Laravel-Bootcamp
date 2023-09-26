<div>

  <script>
    function addCast(movieId)
    {
      let actorID= $("#actorID-" + movieId).select2('val');

      $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });

      $.ajax(
      {
        method: "POST",
        url: "/addCast/" + movieId + "/" + actorID,
        success: (res)=>
        {
          console.log(res);
        }
      })




    }

    $(document).ready(function() {
    $('#actorID-{{$movie->id}}').select2({
      dropdownParent: $('#ModalEdit-{{$movie->id}}')
    });

    });

  </script>

  @if (session()->has('closeModal'))
  <script>
    $(document).ready(function(){
      $('#ModalEdit-{{$movie->id}}').modal('hide');
    })

  </script>
  @endif



  <div wire:ignore.self class="modal fade" id="ModalEdit-{{$movie->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content ps-4 pe-4">

        <div class="modal-header">
          <h5 class="modal-title">Edit Movie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>

        {{-- <img class="" src="{{asset('images/movies/'.$movie->imageMovie)}}" wire:model="imagePreview" alt=""
          style=" height: 100%; right: 31em; bottom: auto; position: absolute; "> --}}

        <div class="modal-body">


          <form wire:submit.prevent="editMovie" enctype="multipart/form-data">
            @method('put')

            @csrf

            <input class="form-control" type="file" wire:model="movie.imageMovie" accept="image/*"
              onchange="showFile(event)">

            <label for="title">Title</label>
            <input class="form-control" id="title" type="text" wire:model="movie.title">
            @error('title') <span class="error">{{ $message }}</span> @enderror

            <label for="year">Year</label>
            <input class="form-control" id="year" type="date" wire:model="movie.year">
            @error('year') <span class="error">{{ $message }}</span> @enderror

            <label for="duration">Duration</label>
            <input class="form-control" id="duration" type="text" wire:model="movie.duration">
            @error('duration') <span class="error">{{ $message }}</span> @enderror

            <label for="synopsis">Synopsis</label>
            <textarea class="form-control" id="synopsis" cols="30" rows="10" wire:model="movie.synopsis"></textarea>
            @error('synopsis') <span class="error">{{ $message }}</span> @enderror

            <label for="actorID">Cast</label>

            <textarea id="" cols="10" rows="10">
              <span></span>
            </textarea>

            <select class="form-control" id="actorID-{{$movie->id}}" onchange="addCast({{$movie->id}})"
              wire:model="movie.mainActorId">
              <option value="">Select main actor</option>
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


  @push('scripts')


  @endpush