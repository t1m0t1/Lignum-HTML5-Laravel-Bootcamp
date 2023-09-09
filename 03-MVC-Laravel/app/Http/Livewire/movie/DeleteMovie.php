<?php

namespace App\Http\Livewire\Movie;

use App\Models\Movie;
use Livewire\Component;

class DeleteMovie extends Component
{
    public Movie $movie;

    public function render()
    {
        return view('livewire.movie.delete-movie', ['data'=> $this->movie]);
    }

    public function delete()
    {
        Movie::destroy($this->movie->id);
        session()->flash('closeModal');
        $this->emitTo('movie.listar-movie','render');
    }
}
