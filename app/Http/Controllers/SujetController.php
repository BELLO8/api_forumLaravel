<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SujetResource;
use App\Models\Sujets;
use App\Http\Requests\SujetRequest;
class SujetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  // dd(Sujets::with('categories')->get());
        return SujetResource::collection(Sujets::with('categories')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SujetRequest $request)
    {
        if(Sujets::create($request->all())){
            return response()->json(array('status'=>'true','success' =>'Enregistré avec succès!'),200);
        }else{
            return response()->json(array('status'=>'false','erreur' =>'Pas enregistré !'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new SujetResource(Sujets::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SujetRequest $request, $id)
    {
        $sujet = Sujets::findOrFail($id);
        if($sujet->update($request->all())){
            return response()->json(array('status'=>'true','success' =>'Modifié avec succès!'));
        }else{
            return response()->json(array('status'=>'false','erreur' =>'Pas enregistré !'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sujet = Sujets::findOrFail($id);
        if($sujet->delete()){
            return response()->json(array('status'=>'true','success' =>"Membre supprimée "),200);
        }else{
            return response()->json(array('status'=>'false','erreur' =>"erreur de suppression "),200);
        };
    }
}
