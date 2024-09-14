<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Service;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::orderBy('created_at', 'desc')->paginate(10);
        return view('RH.divisions.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('RH.divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomFr' => 'required|string|max:255',
            'nomAr' => 'required|string|max:255'
        ]);
        
        $division=new Division();
        $division->nomFr=$request->input('nomFr');
        $division->nomAr=$request->input('nomAr');
        $division->save();
        return redirect()->route('division.index')->with('success', 'Division ajouté avec succès.');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $division=Division::find($id);
        //return view('RH.divisions.edit',compact('division'));

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
        $request->validate([
            'nomFr' => 'required|string|max:255',
            'nomAr' => 'required|string|max:255'
        ]);
        $division = Division::findOrFail($id);
        
        $division->nomFr=$request->input('nomFr');
        $division->nomAr=$request->input('nomAr');
        $division->save();
        return redirect()->route('division.index')->with('success', 'Division modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
     {
         try {
            // Find the division by ID
            $division = Division::findOrFail($id);

            // Loop through each user associated with the division
            foreach ($division->users as $user) {
                // Delete related data for each user
                if ($user->demandes()) $user->demandes()->delete();
                if ($user->maries()) $user->maries()->delete();
                if ($user->enfants()) $user->enfants()->delete();
                if ($user->fichierNotes()) $user->fichierNotes()->delete();

                // Delete the user
                $user->delete();
            }

            // Delete related services
            $division->services()->delete();

            // Delete the division
            $division->delete();
     
             return redirect()->route('division.index')->with('success', 'La division et ses services ont été supprimées avec succès.');
         } catch (\Exception $e) {
             // Log the error for debugging
             \Log::error('Error deleting division: ' . $e->getMessage());
     
             // Redirect back with error message
             return redirect()->route('division.index')->with('error', 'Une erreur est survenue lors de la suppression de la division. Veuillez réessayer.');
         }
     }
     
     
}
