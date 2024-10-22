<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories=categorie::all();
            return response()->json($categories);
       
    }
    catch(\Exception $e){
        return response()->json("impossiblle d afficher");
    }
      } 

    /**
     * Store a newly created resource in storage.
     */
    public function store (Request $request )
    {
        //
        try {
            //code...
            $categorie=new categorie([
                "nomcategorie"=>$request->input("nomcategorie"),
                "imagecategorie"=>$request->input("imagecategorie"),
            ]);
            $categorie->save();
            return response()->json($categorie);

        }catch(\Exception $e){
            //throw $th;
            return response()->json("probleme d'ajout");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            //
        }catch(\Exception $e){
            return response()->json("probleme d'affichage");
            //throw $th;
        }

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
      try{
        $categorie=Categorie::findOrFail($id);
        $categorie->update($request->all());
        return response()->json($categorie);

      }catch (\Exception $e){
        return response()->json("Modification impossible");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $categorie=Categorie::findOrFail($id);
            $categorie->delete();
            return response()->json("categorie supprimee avec succes");


    
            
        }catch(\Exception $e){
            return response()->json("Suppression impossible");
            
        }

       
    }

  
}
