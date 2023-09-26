<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $favorites =  Favorites::query()
        ->select('movieId')
        -> where('userId', '=' , 1)
        ->get()
        ->pluck('movieId')
        ;

        
        
        return view('home',['movies'=>Movie::all(), 'favorites' => $favorites]);
    }
}
