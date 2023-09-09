<?php

namespace App\Http\Livewire\Movie;

use App\Models\Actor;
use Livewire\Component;

class CreateMovie extends Component
{

    public function render()
    {
        return view('livewire.movie.create-movie', ['actors'=> Actor::all()]);
    }
}
