<?php

namespace App\Http\Controllers;

use App\Models\voyage;
use App\Models\marchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoyageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showVoyages=voyage::all();
        return view('voyages.index',compact('showVoyages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('voyages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'numVoy' => 'required|unique:voyages'
         ]);
      
          voyage::create([

         'numVoy'=>$request->numVoy,
         'nomNavire'=>$request->nomNavire,
         'annee'=>$request->annee
         
          ]); 

        return redirect()->route('voyages.index')->with('message', 'Le voyage est bien enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('users.edit',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( voyage $voyage)
    {
        /*  $nbrClients = DB::table("clients")->count();
        $voySel=$ShowVoyage->id;

        $ListeMarchs =marchandise::where('voyage_id','=',3);*/

        return view ('voyages.edit',compact('voyage')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, voyage $voyage)
    {
        //recupère la valeur numVoy et code voyage envoyé 
        $numVoy=$request->numVoy;
        $codeVoy=$request->id;

        //selectionne la somme de poids dans la table march là où voyage_id = voyage selectionné
        //$sumTonage= marchandise::sum('poids1')->where('voyage_id', $codeVoy)->get();
        //$sumTonage = DB::table('marchandises')->where('voyage_id', $codeVoy)->get('poids1');
        $sumTonage = DB::table('marchandises')
                    ->where('voyage_id','=', $codeVoy)
                    ->sum('poids1');

        $sumValeur = DB::table('marchandises')
                    ->where('voyage_id','=', $codeVoy)
                    ->sum('valeur1');            
        
        
        $voyageDossiers=marchandise::join('clients','clients.id','=','marchandises.client_id')
                                    ->join('Chargeurs','chargeurs.id','=','marchandises.chargeur_id')
                                    ->join('voyages','voyages.id','=','marchandises.voyage_id')
                                    ->where('voyage_id', $codeVoy)
                                    ->get(['clients.nomClient','clients.adresseClient','clients.telephoneClient',
                                         'Chargeurs.nomChargeur','Chargeurs.adresseChargeur','Chargeurs.telephoneChargeur',
                                         'marchandises.cond1','marchandises.qty1','marchandises.poids1','marchandises.valeur1',
                                         'voyages.numVoy','voyages.nomNavire','marchandises.monnaie1', 'marchandises.reduction1','marchandises.avisClient',
                                         'marchandises.plainteClient','marchandises.reponseLmc','marchandises.cubage1']); 
        
                                         return view('voyages.index1', compact('voyageDossiers','numVoy','sumTonage','sumValeur')); 
        
        //return redirect()->route('voyages.index1')->with('message', 'Informations modifiées avec succès'); 
    }

    public function delete($voyage)
    {
        voyage::find($voyage)->delete();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
