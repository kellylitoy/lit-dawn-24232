<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\delete;
use App\Models\role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users=User::all();
        /* $users=User::join('roles','roles.id','=','role_id.users')
        ->get(['roles.id','role_id.users','roles.name','users.name','users.email']); */

       
        
        
        // ->get(['marchandises.id','clients.nomClient','marchandises.cond1','marchandises.qty1','marchandises.poids1',
        //        'marchandises.valeur1','chargeurs.nomChargeur', 'marchandises.cubage1','marchandises.monnaie1', 
        //        'marchandises.reduction1' ,'voyages.numVoy', 
        //        ]); 

        
        if($request->has('search')){
            $users=User::where('name','like',"%{$request->search}%")->orWhere('email','like',"%{$request->search}%")->get();
        }
        
        return view('users.index',compact('users'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role=role::all();
        return view('users.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('message','Utilisateur est enregistré avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( User $user)
    {
        return view ('users.edit',compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users)
    {
        $users->update (
            [
                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ] );

         return redirect()->route('users.index')->with('message','Mise à jour réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (auth()->user()->id==$user->id){
            return redirect()->route('users.index')->with('message','Vous etes sur le point de supprimer cette donnée');
        }
     $user->delete();
     return redirect()->route('users.index')->with('message','Utilisateur Supprimée');
    }

    public function delete($user)
    {
       User::find($user)->delete();
       return redirect()->back();
    }
}
