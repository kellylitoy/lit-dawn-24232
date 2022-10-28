<?php

namespace App\Http\Controllers;

use App\Models\chargeur;
use App\Models\client;
use App\Models\marchandise;
use App\Models\voyage;
use Illuminate\Http\Request;

class MarchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sommeTonage=marchandise::sum('poids1');

        $showMarchandises = marchandise::join('clients','clients.id','=','marchandises.client_id')
        ->join('chargeurs','chargeurs.id','=','marchandises.chargeur_id')
        ->join('voyages','voyages.id','=','marchandises.voyage_id')
        
        
        ->get(['marchandises.id','clients.nomClient','marchandises.cond1','marchandises.qty1','marchandises.poids1',
               'marchandises.valeur1','chargeurs.nomChargeur', 'marchandises.cubage1','marchandises.monnaie1', 
               'marchandises.reduction1' ,'voyages.numVoy', 
               ]); 
        

        return view('marchandises.index',compact('showMarchandises','sommeTonage'));
    }

    public function create()
    {
        $voyage=voyage::all();
        $client=client::all();
        $chargeur=chargeur::all();

        return view('marchandises.create',compact('client','chargeur','voyage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*  $this->validate($request,[
            'nomClient' => 'required|unique:clients'
         ]); */
         $client=$request->input('client_id');
         $chargeur=$request->input('chargeur_id');
         $voyage=$request->input('voyage_id');
         $monnaie1=$request->input('monnaie1');
         $cond1=$request->input('cond1');
         $cond2=$request->input('cond2');
         $cond3=$request->input('cond3');
         $cond4=$request->input('cond4');
      
         marchandise::create([

         'client_id'=>$client,
         'chargeur_id'=>$chargeur,
         'voyage_id'=>$voyage,
         
         'cond1'=>$cond1,
         'qty1'=>$request->qty1,
         'poids1'=>$request->poids1,
         'valeur1'=>$request->valeur1,
         'monnaie1'=>$monnaie1,
         'cubage1'=>$request->cubage1,
         'reduction1'=>$request->reduction1,
         'avisClient'=>$request->avisClient,
         'plainteClient'=>$request->plainteClient,
         'reponseLmc'=>$request->reponseLmc,
        
        //  'valeur2'=>$request->valeur2,
        //  'cond3'=>$cond3,
        //  'qty3'=>$request->qty3,
        //  'poids3'=>$request->poids3,
        //  'valeur3'=>$request->valeur3,

        //  'cond4'=>$cond4,
        //  'qty4'=>$request->qty4,
        //  'poids4'=>$request->poids4,
        //  'valeur4'=>$request->valeur4

          ]); 

        return redirect()->route('marchandises.index')->with('message', 'L opération est bien enregistrée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(marchandise $marchandise)
    {
        return view('marchandises.edit', compact('marchandise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($marchandise)
    {
        marchandise::find($marchandise)->delete();
        return redirect()->back();
    }
}
