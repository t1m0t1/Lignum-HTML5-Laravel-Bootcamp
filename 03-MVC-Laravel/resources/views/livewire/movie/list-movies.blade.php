<div>

    <section class="container d-tables">
        <h1 class="text-light text-center mt-5">Movies</h1>

        <livewire:message :message="$message"/>

        <livewire:movie.create-movie>
            <div>
                <label>Search</label>
                <input type="text" wire:model="filters.movieTitle">
            </div>

        <table class="table" style="opacity: 80%;">
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
                @if ($this->filters['movieTitle'] == "")
                @foreach ($this->movies as $movie)
                <tr class="align-middle">
                    <td><img class="img-responsive" src='{{ asset('images/movies/'.$movie->imageMovie) }} 'alt=""
                        style='height: 10vh'>
                    </td>
                    <td> {{ $movie->title }} </td>
                    {{-- <td> {{ $movie->year}} </td> --}}
                    <td> {{ $movie->duration }} </td>
                    <td> {{ $movie->synopsis }} </td>
                    <td> {{ $movie->mainActor->name }} </td>
                    <td>
                        <button class="btn btn-success" data-bs-target="#ModalEdit-{{$movie->id}}" data-bs-toggle="modal">Edit</button>
                    </td>
                    <td>
                            <button class="btn btn-danger" data-bs-target="#ModalDelete-{{$movie->id}}" data-bs-toggle="modal">Delete</button> 
                    </td>
                </tr>
                <div>
                    <livewire:movie.delete-movie :movie="$movie" :key="'edit'.$movie->id">
                </div>
                <div>
                    <livewire:movie.movie-modal-edit :movie="$movie" :key="'edit'.$movie->id">
                </div>

                @endforeach

                @else


                @if (count($this->movies)>0)
                
                @foreach ($this->movies as $item)
                <tr class="align-middle">
                    <td><img class="img-responsive" src='{{ asset('images/movies/'.$item->imageMovie) }} 'alt=""
                        style='height: 10vh'>
                    </td>
                    <td> {{ $item->title }} </td>
                    <td> {{ $item->year}} </td>
                    <td> {{ $item->duration }} </td>
                    <td> {{ $item->synopsis }} </td>
                    <td> {{ $item->mainActor->name }} </td>
                    <td>
                        <button class="btn btn-success" data-bs-target="#ModalEdit-{{$item->id}}" data-bs-toggle="modal">Edit</button>
                    </td>
                    <td>
                            <button class="btn btn-danger" data-bs-target="#ModalDelete-{{$item->id}}" data-bs-toggle="modal">Delete</button> 
                    </td>
                </tr>
                <div>
                    <livewire:movie.delete-movie :movie="$item" :key="'delete'.$item->id">
                </div>
                <div>
                    <livewire:movie.movie-modal-edit :movie="$item" :key="'edit'.$item->id">
                </div>
                @endforeach
                
                @else

                <td>Empty</td>

                @endif



                @endif
                
            </tbody>
        </table>
        
    </section>

        
</div>