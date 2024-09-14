<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(10);
        $divisions=Division::all();
        return view('RH.services.index', compact('services','divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('RH.services.create');
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
            'nomAr' => 'required|string|max:255',
            'id_division' => 'required|exists:divisions,id'
        ]);
        
        $service=new Service();
        $service->nomFr=$request->input('nomFr');
        $service->nomAr=$request->input('nomAr');
        $service->id_division = $request->input('id_division');
        $service->save();
        return redirect()->route('service.index')->with('success', 'Service ajouté avec succès.');
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
    public function edit($id)
    {
       // $service=Service::find($id);
       // return view('RH.services.edit',compact('service'));
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
            'nomAr' => 'required|string|max:255',
            'id_division' => 'required|exists:divisions,id'

        ]);
        $service=Service::find($id);
        
        $service->nomFr=$request->input('nomFr');
        $service->nomAr=$request->input('nomAr');
        $service->id_division = $request->input('id_division');
        $service->update();
        return redirect()->route('service.index')->with('success', 'Service modifié avec succès.');
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

            $service = Service::findOrFail($id);
            foreach ($service->users as $user) {
                if ($user->demandes()) $user->demandes()->delete();
                if ($user->maries()) $user->maries()->delete();
                if ($user->enfants()) $user->enfants()->delete();
                if ($user->fichierNotes()) $user->fichierNotes()->delete();

                // Delete the user
                $user->delete();
            }
            $service->delete();
     
            return redirect()->route('service.index')->with('success', 'La service a été supprimée avec succès.');
        } catch (\Exception $e) {
             \Log::error('Error deleting service: ' . $e->getMessage());
             return redirect()->route('service.index')->with('error', 'Une erreur est survenue lors de la suppression de la service. Veuillez réessayer.');
        }
    }
}
