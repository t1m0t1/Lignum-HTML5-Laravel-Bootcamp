<?php

namespace App\Http\Livewire\movie;

use App\Models\Actor;
use App\Models\Movie;
use Livewire\Component;

class ListMovies extends Component
{
    public Movie $movie;
    public Actor $actor;
    public $message;
    public $search;
    
    public function render()
    {
        return view('livewire.movie.list-movies')
        ->extends('layouts.app')
        ->section('content');
    }

    public function mount()
    {
    }
    

    public $filters=[
        'movieTitle'=> "",
    ];
    
    public function getMoviesProperty(){
      return Movie::query()
      ->when($this->filters['movieTitle'], function ($query){
        return $query->where('title', 'like', "%{$this->filters['movieTitle']}%");
    })
    ->get();
    }

    
}
    