<?php

namespace App\Http\Controllers;

use App\Models\chargeur;
use Illuminate\Http\Request;

class ChargeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showChargeurs=chargeur::all();
        return view('chargeurs.index',compact('showChargeurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chargeurs.create');
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
            'nomChargeur' => 'required|unique:chargeurs'
         ]);
      
          chargeur::create([

         'nomChargeur'=>$request->nomChargeur,
         'adresseChargeur'=>$request->adresseChargeur,
         'telephoneChargeur'=>$request->telephoneChargeur,
         'mail'=>$request->telephoneChargeur
         
          ]); 

        return redirect()->route('chargeurs.index')->with('message', 'Le chargeur est bien enregistré');
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
    public function edit(chargeur $chargeur)
    {
        return view('chargeurs.edit',compact('chargeur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chargeur $chargeur)
    {
        $chargeur->update (
            [
                'nomChargeur' => $request->nomChargeur,
                'adresseChargeur' => $request->adresseChargeur,
                'telephoneChargeur' => $request->telephoneChargeur,
                'mail' => $request->mail
            ] ); 
        
        return redirect()->route('chargeurs.index')->with('message', 'Informations modifiées avec succès');
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
    
    public function delete($chargeur)
    {
        chargeur::find($chargeur)->delete();
        return redirect()->back();
    }
}
