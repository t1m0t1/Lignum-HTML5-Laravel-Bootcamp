<div>

    <button class="btn btn-primary" data-bs-target="#ModalCreate" data-bs-toggle="modal">Create Movie</button>

    <div class="modal" id="ModalCreate">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" id="create">
                    <h5 class="modal-title">Create Movie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{--               @if ($imageMovie)
      
              <img class="" src="{{$imageMovie->temporaryUrl()}}" alt="" style=" height: 100%; right: 31em; bottom: auto; position: absolute; ">
              @endif --}}


                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger d-block mt-3">
                            <ul>
                                @foreach ($erorrs as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session()->has('closeModal'))
                        <script>
                            $(document).ready(function() {
                                $('#ModalCreate').modal('hide');
                            })
                        </script>
                    @endif

                    <form wire:submit.prevent="createMovie" enctype="multipart/form-data">
                        @method('post')

                        @csrf

                        <input class="form-control" type="file" wire:model="imageMovie" accept="image/*"
                            onchange="showFile(event)">

                        <label class="text-light" for="title">Title</label>
                        <input class="form-control" id="title" type="text" wire:model="movie.title">
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror

                        <label class="text-light" for="year">Year</label>
                        <input class="form-control" id="year" type="date" wire:model="movie.year">
                        @error('year')
                            <span class="error">{{ $message }}</span>
                        @enderror

                        <label class="text-light" for="duration">Duration</label>
                        <input class="form-control" id="duration" type="text" wire:model="movie.duration">
                        @error('duration')
                            <span class="error">{{ $message }}</span>
                        @enderror

                        <label class="text-light" for="synopsis">Synopsis</label>
                        <textarea class="form-control" id="synopsis" cols="30" rows="10" wire:model="movie.synopsis"></textarea>
                        @error('synopsis')
                            <span class="error">{{ $message }}</span>
                        @enderror

                        <label class="text-light" for="mainActorId">Main Actor</label>
                        <select class="form-control" id="mainActorId" wire:model="movie.mainActorId">
                            <option value="">Select main actor</option>
                            @foreach ($actors as $actor)
                                <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                            @endforeach
                        </select>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary mt-5" type="submit">Edit</button>
                            <button class="btn btn-danger mt-5" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
