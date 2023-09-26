<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Http\Request;

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
            return "error";
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cast $cast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cast $cast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cast $cast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cast $cast)
    {
        //
    }
}
