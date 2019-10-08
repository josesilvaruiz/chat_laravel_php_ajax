<?php

namespace App\Http\Controllers;

use App\User;

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
    public function index($search = null)
    {
        if(!empty($search)){
            $users = User::where('name','LIKE','%'.$search.'%')
                ->orderBy('name', 'ASC')
                ->get();

        }else{
            $users = User::where('id', '<>', auth()->user()->id)
                ->orderBy('name', 'ASC')
                ->get();
        }
        return view('home', compact('users'));
    }

}
