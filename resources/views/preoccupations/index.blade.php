@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-2xl font-bold mb-4">Liste des Préoccupations</h1>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Auteur</th>
                <th>Téléphone</th>
                <th>Université</th>
                <th>Etablissement</th>
                <th>Date de Soumission</th>
                <th>Description</th>
                <th>Preuve</th>
                <th>Priorité</th>
                <th>Gestionnaire ID</th>
                <th>Méthode de Résolution</th>
                <th>Module Concerné</th>
                <th>Progiciel Concerné</th>
                <th>Date de Début de Traitement</th>
                <th>Date de Fin de Traitement</th>
                <th>Durée de Résolution</th>
                <th>Status</th>
                <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
            </tr>
        </thead>
        <tbody>
            @foreach ($preoccupations as $preoccupation)
            <tr>
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
                <td>{{ $preoccupation->priorite }}</td>
                <td>{{ $preoccupation->gestionnaire_id }}</td>
                <td>{{ $preoccupation->methode_resolution }}</td>
                <td>{{ $preoccupation->module_concerne }}</td>
                <td>{{ $preoccupation->progiciel_concerne }}</td>
                <td>{{ $preoccupation->date_debut_traitement }}</td>
                <td>{{ $preoccupation->date_fin_traitement }}</td>
                <td>{{ $preoccupation->duree_resolution }}</td>
                <td>{{ $preoccupation->status }}</td>
                <td>
                    <div class="relative inline-block text-left">
                       
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
    <a href="{{ route('preoccupations.edit', $preoccupation->id) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
        <i class="fas fa-edit mr-2"></i> 
        
    </a>
    <a href="{{ ( $preoccupation->id) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
        <i class="fas fa-check mr-2"></i> 
        
    </a>
</div>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function toggleMenu(id) {
        const menu = document.getElementById('menu-' + id);
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    }

    // Fermer le menu si on clique en dehors
    window.onclick = function(event) {
        if (!event.target.matches('.inline-flex')) {
            const menus = document.querySelectorAll('[id^="menu-"]');
            menus.forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    }
</script>
@endsection
