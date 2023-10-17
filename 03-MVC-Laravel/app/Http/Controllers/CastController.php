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

        $actorExist=DB:: table('casts')
        ->where('actorID', '=' , $actorID)
        ->where('movieID', '=' , $movieID)
        ->count();

        /* dd($actorExist); */

        if($actorExist === 0){
            $cast = new Cast();
            $cast->movieID = $movieID;
            $cast->actorID = $actorID;
            $cast->save();
            return "success";
        }else{
            return "El actor ya existe";
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

        /* traer todos los actores excepto los que ya se encuentran en el cast */

        $data= Actor::select('name','id')->whereNotIn('id',$actorsIds)->get();

        $options = [];

        foreach ($data as $actor)
        {
            $options[] = [
                'id' => $actor->id,
                'name' => $actor->name,
            ];    
        }


         /* dd($actors);  */
        
        $cast=[];
        
        /* traer los nombres de los actores*/
        for ($i = 0; $i <= count($actorsIds)-1 ; $i++) {
            $cast[$i] = DB::table('actors')
            ->where('id','=', $actorsIds[$i])
            ->get()
            ;
            
        }

 

        if($cast)
        {
        return [$cast,$options];
        }else{
            return null;
        }
    }

    public function deleteActorToCast($movieID,$actorID)
    {
        DB:: table('casts')
        ->where('actorID', '=' , $actorID)
        ->where('movieID', '=' , $movieID)
        ->delete();
        
        
        /* dd($castID[0]); */

        return 'success';
    }
}
