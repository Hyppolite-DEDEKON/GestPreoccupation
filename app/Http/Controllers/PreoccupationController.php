<?php

namespace App\Http\Controllers;

use App\Models\Preoccupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PreoccupationController extends Controller
{
    public function index()
    {
        $preoccupations = Preoccupation::all();
        return view('preoccupations.index', compact('preoccupations'));
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

    public function update(Request $request, Preoccupation $preoccupation)
    {
        $request->validate([
            'auteur' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'universite' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
            'description' => 'required|string',
            'priorite' => 'required|in:basse,moyenne,haute',
            'module_concerne' => 'required|string|max:255',
            'progiciel_concerne' => 'required|string|max:255',
            'preuve' => 'nullable|file|mimes:jpeg,png,jpg,mp4,avi',
        ]);

        if ($request->hasFile('preuve')) {
            // Supprimer l'ancienne preuve si elle existe
            if ($preoccupation->preuve) {
                Storage::disk('public')->delete($preoccupation->preuve);
            }
            $preuvePath = $request->file('preuve')->store('preuves', 'public');
            $preoccupation->preuve = $preuvePath;
        }

        $preoccupation->update($request->except('preuve'));

        return redirect()->route('preoccupations.index')->with('success', 'Préoccupation mise à jour.');
    }
}
