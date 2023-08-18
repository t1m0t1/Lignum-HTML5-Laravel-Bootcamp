<div>
<h1 class="text-light text-center mt-5">Movies</h1>

    {{-- <a href="{{ url('movie/create') }}" class="position-absloute top-0 ms-5 translate-middle btn btn-primary">Create
        Movie</a>
 --}}
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
        <tbody class="overflow-scroll">
            @foreach ($movies as $movie)
                <tr class="align-middle">
                    <td><img class="img-responsive"
                            src='{{ asset('images/movies/'.$movie->imageMovie) }} 'alt="" style='height: 10vh'>
                    </td>
                    <td> {{ $movie->title }} </td>
                    <td> {{ $movie->year->format('d/m/Y') }} </td>
                    <td> {{ $movie->duration }} </td>
                    <td> {{ $movie->synopsis }} </td>
                    <td> {{ $movie->mainActor->name }} </td>
                    <td>
                        {{-- <a href={{url('movie/'.$movie->id.'/edit')}} class="btn btn-success">Edit</a> --}}
                        <button wire:click="showModalEdit({{$movie->id}})" class="btn btn-success">Edit</button>
                    </td>
                    <td>
                        <form action="{{ url('movie/' . $movie->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    

<div class="modal" style="display:{{$show}}; left:15em;">
  <div class="modal-dialog modal-dialog-centered">
      <div class="">
        
      </div>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close"  wire:click="closeModalEdit"></button>
        </div>
        <img class="" src="{{asset('images/movies/'.$imagePreview)}}" wire:model="imagePreview" alt="" style=" height: 100%; right: 31em; bottom: auto; position: absolute; ">
        <div class="modal-body">
          <form action="{{ url('movie/'.$movie->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
           
            @csrf
            <input type="hidden" wire:model="hiddenId">
            {{-- <input type="hidden" wire:model="hiddenImageMovie"> --}}




            <input class="form-control" type="file" wire:model="imageMovie" accept="image/*" onchange="showFile(event)">
            
            <label class="text-light" for="title">Title</label>
            <input class="form-control" type="text" wire:model="title">
            
            <label class="text-light" for="year">Year</label>
            <input  class="form-control" type="date" wire:model="year" value="{{$year}}">
            
            <label class="text-light" for="duration">Duration</label>
            <input class="form-control" type="text" wire:model="duration">
            
            <label class="text-light" for="synopsis">Synopsis</label>
            <textarea class="form-control" cols="30" rows="10" wire:model="synopsis"></textarea>
            
            <label class="text-light" for="mainActorId">Main Actor</label>
            <select class="form-control" wire:model="mainActorId">
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
        </div>
      </div>
    </div>
  </div>

</div>
{{--   style=" position: fixed;
z-index: 1; 
left: 0;
top: 0;
width: 100%;
height: 100%;
background-color: rgba(0,0,0,0.4); " --}}