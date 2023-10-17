<?php

namespace App\Http\Livewire;

/* use Livewire\Attributes\On; */

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ModalEdit extends Component
{
    public Actor $actor;
    public $movies;
    public $movieCastID;
    public $movieCast = [];
    public $movieOption;


    protected $listeners = 
    [
        'editActor',
        'addMovieToActor'
    ];

    protected $rules =
    [
        'actor.name' => 'required|string|min:6',
        'actor.date_of_birth' => 'required|string|min:6',
    ];

    public function mount()
    {
        $this->actor = new Actor();
        $this->movies = Movie::all();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('instanciar-select2');
        return view('livewire.modal-edit');
    }

    public function save()
    {
        $this->validate();
        $this->actor->save();
    }

    /*   #[On('editActor')] */
    public function editActor($id)
    {

        $this->actor = Actor::find($id);

        $this->movieCastID = DB::table('casts')
            ->where('actorId', '=', $id)
            ->get()
            ->pluck('movieId')
            ->toArray();

        $this->movieCast = [];

        for ($i = 0; $i <= count($this->movieCastID) - 1; $i++) {
            $this->movieCast[$i] =
                DB::table('movies')
                ->where('id', '=', $this->movieCastID[$i])
                ->get()
                ->toArray();
        }

        $pruebita = Movie::whereHas('casts', function($q) use($id){
            $q = $q->where('actorId', '=', $id);
        })
        ->get();

        dd($pruebita);
        /* dd(Movie::all(),  $this->movieCast); */
        /* $this->resetValidation(); */
    }



    public function updatedMovieOption()
    {
        dd($this->movieOption);
    }
}
