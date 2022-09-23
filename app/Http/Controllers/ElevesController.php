<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleve;

class ElevesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // recuperation des donnees sous forme d'un tableau
        $eleves = Eleve::all();
    
        // afficher les donnees sur le template index.blade.php
        return view('index', compact('eleves'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required',
            'niveau' => 'required|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
 
        if ($photo = $request->file('photo')) {
            $destinationPath = 'photo/';
            $profilePhoto = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profilePhoto);
            $validatedData['photo'] = "$profilePhoto";
        }
 
        $eleve = Eleve::create($validatedData);
 
        return redirect('/eleve')->with('Bravo!!!', 'Elève créé avec succès');

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
        
        $eleve = Eleve::find($id);
        return view('show',compact('eleve'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    
        $eleve = Eleve::find($id);
        return View('edit')->with('eleve', $eleve);

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
  
        $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required',
            'niveau' => 'required|max:255',
            //'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $eleve = Eleve::whereId($id)->first();
    
        if($request->hasFile("photo")){
            $destinationPath = 'photo/';
            $profilePhoto = date('YmdHis') . "." . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move($destinationPath, $profilePhoto);
            $eleve->photo = $profilePhoto;
        }

        $eleve->update($request->only(['nom','prenom','email','telephone','niveau']));

        return redirect('/eleve')->with('Bravo!!!', 'Elève mise a jour avec succès');


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

        $eleve = Eleve::find($id);
        $eleve->delete();

        return redirect('/eleve')->with('Bravo!!!', 'Elève supprimé avec succès');

    }
}
