<?php

namespace App\Http\Controllers;

use App\Models\Preoccupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PreoccupationController extends Controller
{
    public function index()
    {
    
        $preoccupations = Preoccupation::with('gestionnaire')->get();
    
        return view('preoccupations.index', compact('preoccupations'));
    }
    public function dashboard()
    {
        $totalPreoccupations = Preoccupation::count();
        $preoccupationsResolues = Preoccupation::where('status', 'Résolue')->count();
        $preoccupationsNonResolues = Preoccupation::where('status', 'Non Résolue')->count();
        dd($totalPreoccupations);
        return view('dashboard', compact('totalPreoccupations', 'preoccupationsResolues', 'preoccupationsNonResolues'));
    }
    


    public function create()
    {
        return view('preoccupations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'auteur' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'universite' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
            'date_soumission' => 'required|date',
            'description' => 'required|string',

            'priorite' => 'required|in:basse,moyenne,haute',
            'module_concerne' => 'required|string|max:255',
            'progiciel_concerne' => 'required|string|max:255',
            'preuve' => 'nullable|file|mimes:jpeg,png,jpg,mp4,avi',
        ]);

        $preuvePath = null;
        if ($request->hasFile('preuve')) {
            $preuvePath = $request->file('preuve')->store('preuves', 'public');
        }

        Preoccupation::create([
            'auteur' => $request->auteur,
            'telephone' => $request->telephone,
            'universite' => $request->universite,
            'etablissement' => $request->etablissement,
            'date_soumission' => $request->date_soumission,
            'description' => $request->description,

            'preuve' => $preuvePath,
            'priorite' => $request->priorite,
            'module_concerne' => $request->module_concerne,
            'progiciel_concerne' => $request->progiciel_concerne,
                ]);

        return redirect()->route('preoccupations.index')->with('success', 'Préoccupation créée avec succès.');
    }

    public function edit(Preoccupation $preoccupation)
    {
        return view('preoccupations.edit', compact('preoccupation'));
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
        $request->validate([
            'auteur' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'universite' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
            'date_soumission' => 'required|date',
            'description' => 'required|string',
            'preuve' => 'nullable|file|mimes:jpeg,png,jpg,mp4,avi',
            'priorite' => 'required|in:basse,moyenne,haute',
            'gestionnaire_nom' => 'nullable|string',
            'methode_resolution' => 'nullable|string',
            'module_concerne' => 'required|string|max:255',
            'progiciel_concerne' => 'required|string|max:255',
            'date_debut_traitement' => 'nullable|date',
            'date_fin_traitement' => 'nullable|date',
            'duree_resolution' => 'nullable|integer',
            'status' => 'required|in:non_resolue,en_cours,resolue',
        ]);
    
        $preoccupation = Preoccupation::findOrFail($id);
    
        $preuvePath = $preoccupation->preuve; 
        if ($request->hasFile('preuve')) {
            $preuvePath = $request->file('preuve')->store('preuves', 'public');
        }
       
    
        $preoccupation->update([
            'auteur' => $request->auteur,
            'telephone' => $request->telephone,
            'universite' => $request->universite,
            'etablissement' => $request->etablissement,
            'date_soumission' => $request->date_soumission,
            'description' => $request->description,
            'preuve' => $preuvePath,
            'priorite' => $request->priorite,
            'gestionnaire_nom' => $request->gestionnaire_nom,
            'methode_resolution' => $request->methode_resolution,
            'module_concerne' => $request->module_concerne,
            'progiciel_concerne' => $request->progiciel_concerne,
            'date_debut_traitement' => $request->date_debut_traitement,
            'date_fin_traitement' => $request->date_fin_traitement,
            'duree_resolution' => $request->duree_resolution,
            'status' => $request->status,
        ]);
    
        return redirect()->route('preoccupations.index')->with('success', 'Préoccupation mise à jour avec succès.');
    }
    
}
