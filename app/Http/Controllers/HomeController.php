<?php

namespace App\Http\Controllers;

use App\Models\Cars;
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
        $cars=Cars::get();
        return view('home',['car'=>$cars]);
    }
    public function pesan($id)
    {
        
        $cars=Cars::find(decrypt($id));
        // return view('home',['car'=>$cars]);
        dd($cars);

    }
}
