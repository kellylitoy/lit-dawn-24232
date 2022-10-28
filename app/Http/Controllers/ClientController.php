<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\marchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $showClients=client::all();
        $nbrClients=  DB::table("clients")->count();
        
        if($request->has('search')){
            $showClients= client::where('nomClient','like',"%{$request->search}%")->orWhere('adresseClient','like',"%{$request->search}%")->get();
        }

        return view('clients.index',compact('showClients','nbrClients'));
    }

    /* public function print()
    {
        $showClients=client::all();

        return view('clients.print',compact('showClients'));
    }
 */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'nomClient' => 'required|unique:clients'
         ]);
      
          client::create([

         'nomClient'=>$request->nomClient,
         'adresseClient'=>$request->adresseClient,
         'telephoneClient'=>$request->telephoneClient,
         'mail'=>$request->mail
         
          ]); 

        return redirect()->route('clients.index')->with('message', 'Le client est bien enregistré');
    }

    public function CalculSomme ()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*  public function show(Request $request, client $client)
    {
       
        $codeClient=$request->id;
        $nbrClients = DB::table('marchandises')
                     ->where('client_id', $codeClient)
                     ->count();
      $clientDossiers=marchandise::join('clients','clients.id','=','marchandises.client_id')
                                 ->join('Chargeurs','chargeurs.id','=','marchandises.chargeur_id')
                                 ->join('voyages','voyages.id','=','marchandises.voyage_id')
                                 ->where('client_id', $codeClient)
                                 ->get(['clients.nomClient','clients.adresseClient','clients.telephoneClient',
                                        'Chargeurs.nomChargeur','Chargeurs.adresseChargeur','Chargeurs.telephoneChargeur',
                                        'marchandises.cond1','marchandises.qty1','marchandises.poids1','marchandises.valeur1',
                                        'voyages.numVoy','voyages.nomNavire','marchandises.monnaie1', 'marchandises.reduction1','marchandises.avisClient',
                                        'marchandises.plainteClient','marchandises.reponseLmc','marchandises.cubage1']); 
       
                                        return view('clients.print', compact('clientDossiers')); 
    }  */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(client $client)
    {
        $nomClient = client::all();
        return view ('clients.edit',compact('client','nomClient')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, client $client)
    {
         $nbrVoy=  DB::table("voyages")->count();
         $nomClient=$request->nomClient;
         $codeClient=$request->id;
         //$nbrClients = DB::table("clients")->count();
         $nbrClients = DB::table("marchandises")
                      ->where('client_id', $codeClient)
                      ->count();

          /* $client->update (
            [
                'nomClient' => $nomClient,
                'id' => $codeClient
            ] );   */

       $clientDossiers=marchandise::join('clients','clients.id','=','marchandises.client_id')
                                  ->join('Chargeurs','chargeurs.id','=','marchandises.chargeur_id')
                                  ->join('voyages','voyages.id','=','marchandises.voyage_id')
                                  ->where('client_id', $codeClient)
                                  ->get(['clients.nomClient','clients.adresseClient','clients.telephoneClient',
                                         'Chargeurs.nomChargeur','Chargeurs.adresseChargeur','Chargeurs.telephoneChargeur',
                                         'marchandises.cond1','marchandises.qty1','marchandises.poids1','marchandises.valeur1',
                                         'voyages.numVoy','voyages.nomNavire','marchandises.monnaie1', 'marchandises.reduction1','marchandises.avisClient',
                                         'marchandises.plainteClient','marchandises.reponseLmc','marchandises.cubage1']); 
        
        //$clientDossiers=marchandise::where('client_id', $codeClient)->get();

        return view('home1', compact('clientDossiers','nomClient','nbrVoy')); 

    }

    public function printPreview(Request $request, client $client)
    {
        // $nomClient=$request->nomClient;
         $codeClient=$request->id;
         //$nbrClients = DB::table("clients")->count();
         $nbrClients = DB::table("marchandises")
                      ->where('client_id', $codeClient)
                      ->count();

          /* $client->update (
            [
                'nomClient' => $nomClient,
                'id' => $codeClient
            ] );   */

       $clientDossiers=marchandise::join('clients','clients.id','=','marchandises.client_id')
                                  ->join('Chargeurs','chargeurs.id','=','marchandises.chargeur_id')
                                  ->join('voyages','voyages.id','=','marchandises.voyage_id')
                                  ->where('client_id', $codeClient)
                                  ->get(['clients.nomClient','clients.adresseClient','clients.telephoneClient',
                                         'Chargeurs.nomChargeur','Chargeurs.adresseChargeur','Chargeurs.telephoneChargeur',
                                         'marchandises.cond1','marchandises.qty1','marchandises.poids1','marchandises.valeur1',
                                         'voyages.numVoy','voyages.nomNavire','marchandises.monnaie1', 'marchandises.reduction1','marchandises.avisClient',
                                         'marchandises.plainteClient','marchandises.reponseLmc','marchandises.cubage1']); 
        
                                         return view( compact('clientDossiers'),compact('nomClient')); 

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

    public function delete($client)
    {
        client::find($client)->delete();
        return redirect()->back();
    }
}
