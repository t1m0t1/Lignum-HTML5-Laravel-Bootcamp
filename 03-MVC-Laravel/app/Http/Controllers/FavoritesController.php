<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{


    public function index(){
        return view('favorites.indexFavorites',['favorites'=> Favorites::all()]); // pasar id de usuario
    }

    public function addToFavorites(Request $request)
    {   
        $movie = Movie::findOrFail($request->id);
        $user = Auth::user();
        
        $favorite = Favorites::where('userId', $user->id)->where('movieId', $movie->id)->first();
    
        if (!$favorite) {
            Favorites::create(['userId' => $user->id, 'movieId' => $movie->id]);
            return response()->json(['success' => true]);
        }
    
        return response()->json(['success' => false]);
    }

}
