<div>

    <div wire:ignore.self class="modal fade" id="modalEditActor" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ps-4 pe-4">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Actor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                {{-- <img id="imageMovie" src="" alt=""
                    style=" height: 100%; right: 31em; bottom: auto; position: absolute; "> --}}
                <div class="modal-body">




                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        @method('put')

                        @csrf

                        {{-- <input class="form-control" type="file" accept="image/*" onchange="showFile(event)"> --}}
                        <div>
                            <label for="name">Name</label>
                            <input class="form-control @error('actor.name') is-invalid @enderror" type="text"
                                wire:model='actor.name'>
                            @error('actor.name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mt-2">
                            <label for="dateOfBirth">Date of Birth</label>
                            <input class="form-control @error('dateOfBirth') is-invalid @enderror" id="dateOfBirth"
                                type="date" wire:model='actor.date_of_birth'>
                            @error('dateOfBirth') <div class="error">{{ $message }}</div> @enderror
                        </div>

                        <label for="movieID">Movies</label>

                        <ul>
                            @if (count($movieCast) > 0)

                            @foreach ($movieCast as $item)
                            <li><input type="button" value="x" wire:click="deleteMovieToCast({{$item[0]->id}})">
                                {{$item[0]->title}}</li>
                            @endforeach

                            @endif
                        </ul>

                        <div>
                            <select class="form-control" id="select2MovieID"
                                wire:model='movieOption'>
                                @foreach ($movies as $movie)
                                <option value="{{$movie->id}}">{{$movie->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid gap-2 mb-2">
                            <button class="btn btn-primary mt-5" type="submit">Edit</button>
                            <button class="btn btn-secondary mt-1" type="button" data-bs-dismiss="modal">Close</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <script>

    document.addEventListener('livewire:load', function () {
        $('#select2MovieID').on('change', function(){
        console.log('holi8');
        @this.set('movieOption', $(this).val());
    });
    });

    </script>

</div>