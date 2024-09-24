@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="position-fixed top-0 start-0 w-100 bg-white text-center text-2xl font-bold mb-4 p-3 shadow-sm" style="z-index: 1000;">
        Liste des Préoccupations
    </h1>

    <!-- Ajout de marge supérieure pour espacer le contenu du titre fixe -->
    <div class="mt-5 pt-5"> 
        <div class="text-end mb-8"> 
            <a href="{{ route('preoccupations.create') }}" class="btn btn-success">Nouveau +</a>
        </div>

        @if ($preoccupations->isEmpty())
            <div class="alert alert-warning text-center">
                Aucune préoccupation à afficher.
            </div>
        @else
            <table class="table table-sm table-striped table-bordered" style="font-size: 0.85rem;"> 
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Auteur</th>
                        <th>Téléphone</th>
                        <th>Université</th>
                        <th>Etablissement</th>
                        <th>Date de Soumission</th>
                        <th>Description</th>
                        <th>Preuve</th>
                        <th>Priorité</th>
                        <th>Gestionnaire</th>
                        <th>Méthode de Résolution</th>
                        <th>Module Concerné</th>
                        <th>Progiciel Concerné</th>
                        <th>Date de Début de Traitement</th>
                        <th>Date de Fin de Traitement</th>
                        <th>Durée de Résolution</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($preoccupations as $preoccupation)
                    <tr>
                        <td>{{ $preoccupation->id }}</td>
                        <td>{{ $preoccupation->auteur }}</td>
                        <td>{{ $preoccupation->telephone }}</td>
                        <td>{{ $preoccupation->universite }}</td>
                        <td>{{ $preoccupation->etablissement }}</td>
                        <td>{{ $preoccupation->date_soumission }}</td>
                        <td>{{ $preoccupation->description }}</td>
                        <td>
                            @if ($preoccupation->preuve)
                                <a href="{{ asset('storage/' . $preoccupation->preuve) }}" target="_blank">Voir</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <span class="px-2 py-1 
                                @if($preoccupation->priorite == 'basse') bg-green-200 text-green-800 
                                @elseif($preoccupation->priorite == 'moyenne') bg-yellow-200 text-yellow-800 
                                @elseif($preoccupation->priorite == 'haute') bg-red-200 text-red-800 
                                @endif
                                rounded-full">
                                {{ ucfirst($preoccupation->priorite) }}
                            </span>
                        </td>
                        <td>{{ $preoccupation->gestionnaire_id }}</td>
                        <td>{{ $preoccupation->methode_resolution }}</td>
                        <td>{{ $preoccupation->module_concerne }}</td>
                        <td>{{ $preoccupation->progiciel_concerne }}</td>
                        <td>{{ $preoccupation->date_debut_traitement }}</td>
                        <td>{{ $preoccupation->date_fin_traitement }}</td>
                        <td>{{ $preoccupation->duree_resolution }}</td>
                        <td>
                            <span class="px-2 py-1 
                                @if($preoccupation->status == 'en cours') bg-blue-200 text-blue-800 
                                @elseif($preoccupation->status == 'résolu') bg-green-200 text-green-800 
                                @elseif($preoccupation->status == 'non résolu') bg-red-200 text-red-800 
                                @endif
                                rounded-full">
                                {{ ucfirst($preoccupation->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="relative inline-block text-left">
                                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                    <a href="{{ route('preoccupations.edit', $preoccupation->id) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                        <i class="fas fa-edit mr-2"></i> 
                                    </a>
                                    <a href="{{ route('preoccupations.show', $preoccupation->id) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                        <i class="fas fa-check mr-2"></i> 
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
