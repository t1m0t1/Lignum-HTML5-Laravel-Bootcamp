<?php

namespace App\Http\Livewire\movie;

use App\Models\Actor;
use App\Models\Movie;
use Livewire\WithFileUploads;
use Livewire\Component;

class MovieModalEdit extends Component
{   
    use WithFileUploads;
    
    public Movie $movie;
    public $actors;

    public function mount()
    {
        $this->actors = Actor::all();
    }

    protected function rules()
    {
        return[
            'movie.title' => 'required|string',
            'movie.year' => 'nullable|date:m/d/Y',
            'movie.duration' => 'nullable',
            'movie.synopsis' => 'nullable|string',
            'movie.imageMovie' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2028',
            'movie.mainActorId' => 'nullable'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function render()
    {
        return view('livewire.movie.movie-modal-edit');
    }

    /* Funciones Modal */
    
    public function closeModalEdit(){
       $this->movie = new Movie();
       
    }
    
    /* Funciones manipulacion de peliculas */
    public function editMovie()
    {   
        dd($this->movie);
        $this->validate();
    }


}
