<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Resources\CategorieResource;
use App\Http\Requests\CategorieRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategorieResource::collection(Categorie::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieRequest $request)
    {
        if(Categorie::create($request->all())){
            return response()->json(array('status'=>'true','success' =>"Categorie enregistrée"),200);
        }else{
            return response()->json(array('status'=>'false','Erreur d\'enregistrement '));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
         return new CategorieResource($categorie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(CategorieRequest $request, Categorie $categorie)
    {
        if($categorie->update($request->all())){
            return response()->json(array('status'=>'true','success' =>"Categorie mis à jour "),200);
        }else{
            return response()->json(array('status'=>'false','Erreur de mis à jour '));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        if($categorie->delete()){
            return response()->json(array('status'=>'true','success' =>"Categorie supprimée "),200);
        };
    }
}
