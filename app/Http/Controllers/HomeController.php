<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use App\Models\voyage;
use Illuminate\Support\Facades\DB;

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
    public function index(Request $request)
    { 
        $nbrVoy=  DB::table("voyages")->count();
        $nbrChargeur=  DB::table("chargeurs")->count();
        $clients=client::all();
        $nbrClients = DB::table("clients")->count();

        if($request->has('search')){
            $clients= client::where('nomClient','like',"%{$request->search}%")->orWhere('adresseClient','like',"%{$request->search}%")->get();
        } 

        return view('home',compact('clients','nbrClients','nbrVoy','nbrChargeur'));
    }
}
