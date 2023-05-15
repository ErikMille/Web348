<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User ;

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
        $user = Auth::user();
        return view('home', ['posts' => $user->posts()->paginate(5)]);
    }

    public function show($id)
    {   
        if (Auth::user()->id == $id) return redirect('/home');
        return view('user', ['posts' =>User::findOrFail($id)->posts()->paginate(5)]);
    }
}
