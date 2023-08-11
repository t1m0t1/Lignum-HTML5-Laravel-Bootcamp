<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        return view('actor.indexActor', ['actors' => Actor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('actor.createActor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'=> 'required|unique:actors',
            'dateActor'=> 'required|date',
            'imageActor'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028'
        ]);

        $fileName =time().'.'.request()->imageActor->getClientOriginalExtension();
        request()->imageActor->move(public_path('images'), $fileName);

        $actor = new Actor();
        $actor->name = $request->input('name');
        $actor->date_of_birth = $request->input('dateActor');
        $actor->imageActor = $fileName;
        $actor->save();
        return redirect('actor');
    }

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('actor.editActor', ['actor' => Actor::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actor $actor)
    {
        $request->validate([
            'name'=> 'required',
            'dateActor'=> 'required|date'
        ]);

        $fileName = $request->hiddenImageActor;

        if ($request->imageActor != '') {
        $fileName =time().'.'.request()->imageActor->getClientOriginalExtension();
        request()->imageActor->move(public_path('images'), $fileName);
        }

        $actor = Actor::find($request->hiddenId);
        $actor->name = $request->input('name');
        $actor->date_of_birth = $request->input('dateActor');
        $actor->imageActor = $fileName;
        $actor->save();

        return redirect('actor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { /* dd($id); */
        $actor = Actor::find($id);
        $imagePath = public_path()."/images/";
        $image = $imagePath. $actor->imageActor;

        if(file_exists($image)){
            @unlink($image);
        }
        $actor->delete();
        return redirect('actor');
    }
}
