<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addCast($movieID,$actorID)
    {

        
        $movie= Movie::find($movieID);
        $actor=Actor::find($actorID);


        if($movie && $actor){
            $cast = new Cast();
            $cast->movieID = $movieID;
            $cast->actorID = $actorID;
            $cast->save();
            return "success";
        }else{
            return "error al ingresar un actor al elenco";
        }
        
    }

   
    public function searchCast($id)
    {
        $actorsIds= Cast::query()
        ->select()
        -> where('movieId', '=' , $id)
        ->get()
        ->pluck('actorId')
        ->toArray()
        ;

        /* dd($actorsIds); */

        $cast=[];
        
        for ($i = 0; $i <= count($actorsIds)-1 ; $i++) {
            $cast[$i] = DB::table('actors')
            ->where('id','=', $actorsIds[$i])
            ->get()
            ;
            
        }

 

        if($cast)
        {
            return $cast;
        }else{
            return null;
        }
    }
}
