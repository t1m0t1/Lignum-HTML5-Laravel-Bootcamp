<?php

namespace App\Http\Livewire;

use App\Models\Actor;
use App\Models\Movie;
use Livewire\Component;

class MovieModalEdit extends Component
{   
    public $hiddenId;

    public $imagePreview = '1691805345.png';
    public $title;
    public $year;
    public $duration;
    public $synopsis;
    public $imageMovie;
    public $mainActorId;

    public $show = "none";
    public Movie $movieEdit;
    public Actor $actor;

    public function showModalEdit($id){
       $this->show= 'block';

       $this->movieEdit= Movie::find($id);
       $this->hiddenId = $this->movieEdit->id;
       $this->imagePreview = $this->movieEdit->imageMovie;
       $this->title = $this->movieEdit->title;
       $this->year = $this->movieEdit->year->format('d-m-Y');
       $this->duration = $this->movieEdit->duration;
       $this->synopsis = $this->movieEdit->synopsis;
       $this->imageMovie = $this->movieEdit->imageMovie;
    }

    public function closeModalEdit(){
       $this->show= 'none';
       
    }

    public function render()
    {
        return view('livewire.movie-modal-edit' , ['movies' => Movie::all(), 'actors'=> Actor::all()]);
    }
}
