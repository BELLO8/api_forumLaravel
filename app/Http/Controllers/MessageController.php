<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\Http\Resources\MessageResource;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  MessageResource::collection(Messages::with(['membres','sujets'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        if(Messages::create($request->all())){
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
        return new MessageResource(Messages::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request, $id)
    {
        $message = Messages::findOrFail($id);
        if($message->update($request->all())){
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
        $message = Messages::findOrFail($id);
        if($message->delete()){
            return response()->json(array('status'=>'true','success' =>"Message supprimé"),200);
        }else{
            return response()->json(array('status'=>'false','erreur' =>"erreur de suppression "),200);
        };
    }
}
