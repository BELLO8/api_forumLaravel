<?php

namespace App\Http\Controllers;

use App\Models\Membres;
use Illuminate\Http\Request;
use App\Http\Resources\MembresResource;
use App\Http\Requests\MembreRequest;

class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MembresResource::collection(Membres::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembreRequest $request)
    {
        if(Membres::create($request->all())){
            return response()->json(array('status'=>'true','success' =>'Enregistré avec succès!'),200);
        }else{
            return response()->json(array('status'=>'false','erreur' =>'Pas enregistré !'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membres  $membres
     * @return \Illuminate\Http\Response
     */
    public function show($membres)
    {
        return new MembresResource(Membres::find($membres));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membres  $membres
     * @return \Illuminate\Http\Response
     */
    public function update(MembreRequest $request,  $id)
    {
        $membre = Membres::findOrFail($id);
        if($membre->update($request->all())){
            return response()->json(array('status'=>'true','success' =>'Modifié avec succès!'));
        }else{
            return response()->json(array('status'=>'false','erreur' =>'Pas enregistré !'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membres  $membres
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $membre = Membres::findOrFail($id);
        if($membre->delete()){
            return response()->json(array('status'=>'true','success' =>"Membre supprimée "),200);
        };
    }
}
