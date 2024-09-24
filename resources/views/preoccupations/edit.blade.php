@extends('layout')

@section('content')
<div class="container">
    <h1>Modifier la Préoccupation</h1>

    <form action="{{ route('preoccupations.update', $preoccupation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Champ Auteur -->
        <div class="form-group">
            <label for="auteur">Auteur</label>
            <input type="text" name="auteur" value="{{ $preoccupation->auteur }}" class="form-control" required>
        </div>

        <!-- Champ Téléphone -->
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" value="{{ $preoccupation->telephone }}" class="form-control" required>
        </div>

        <!-- Champ Université -->
        <div class="form-group">
            <label for="universite">Université</label>
            <input type="text" name="universite" value="{{ $preoccupation->universite }}" class="form-control" required>
        </div>

        <!-- Champ Etablissement -->
        <div class="form-group">
            <label for="etablissement">Etablissement</label>
            <input type="text" name="etablissement" value="{{ $preoccupation->etablissement }}" class="form-control" required>
        </div>

        <!-- Champ Date de Soumission -->
        <div class="form-group">
            <label for="date_soumission">Date de Soumission</label>
            <input type="date" name="date_soumission" value="{{ $preoccupation->date_soumission }}" class="form-control" required>
        </div>

        <!-- Champ Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $preoccupation->description }}</textarea>
        </div>

        <!-- Champ Preuve (fichier) -->
        <div class="form-group">
            <label for="preuve">Preuve</label>
            <input type="file" name="preuve" class="form-control">
            @if ($preoccupation->preuve)
                <p>Preuve actuelle : <a href="{{ asset('storage/' . $preoccupation->preuve) }}" target="_blank">Voir</a></p>
            @endif
        </div>

        <!-- Champ Priorité -->
        <div class="form-group">
            <label for="priorite">Priorité</label>
            <select name="priorite" class="form-control" required>
                <option value="basse" {{ $preoccupation->priorite == 'basse' ? 'selected' : '' }}>Basse</option>
                <option value="moyenne" {{ $preoccupation->priorite == 'moyenne' ? 'selected' : '' }}>Moyenne</option>
                <option value="haute" {{ $preoccupation->priorite == 'haute' ? 'selected' : '' }}>Haute</option>
            </select>
        </div>

        <div class="form-group">
    <label for="gestionnaire">Gestionnaire</label>
    <input type="text" name="gestionnaire" value="{{ Auth::user()->name }}" class="form-control" readonly>
</div>


        <!-- Champ Méthode de Résolution -->
        <div class="form-group">
            <label for="methode_resolution">Méthode de Résolution</label>
            <input type="text" name="methode_resolution" value="{{ $preoccupation->methode_resolution }}" class="form-control" required>
        </div>

        <!-- Champ Module Concerné -->
        <div class="form-group">
            <label for="module_concerne">Module Concerné</label>
            <input type="text" name="module_concerne" value="{{ $preoccupation->module_concerne }}" class="form-control" required>
        </div>

        <!-- Champ Progiciel Concerné -->
        <div class="form-group">
            <label for="progiciel_concerne">Progiciel Concerné</label>
            <input type="text" name="progiciel_concerne" value="{{ $preoccupation->progiciel_concerne }}" class="form-control" required>
        </div>

        <!-- Champ Date de Début de Traitement -->
        <div class="form-group">
            <label for="date_debut_traitement">Date de Début de Traitement</label>
            <input type="date" id="date_debut_traitement" name="date_debut_traitement" value="{{ $preoccupation->date_debut_traitement }}" class="form-control" required>
        </div>

        <!-- Champ Date de Fin de Traitement -->
        <div class="form-group">
            <label for="date_fin_traitement">Date de Fin de Traitement</label>
            <input type="date" id="date_fin_traitement" name="date_fin_traitement" value="{{ $preoccupation->date_fin_traitement }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="duree_resolution">Durée de Résolution (en jours)</label>
            <input type="text" id="duree_resolution" name="duree_resolution" value="{{ $preoccupation->duree_resolution }}" class="form-control" readonly>
        </div>

        <!-- Champ Statut -->
        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" class="form-control" required>
                <option value="en cours" {{ $preoccupation->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="résolu" {{ $preoccupation->status == 'résolu' ? 'selected' : '' }}>Résolu</option>
                <option value="non résolu" {{ $preoccupation->status == 'non résolu' ? 'selected' : '' }}>Non résolu</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
<script>
    // Fonction pour calculer la différence de jours entre deux dates
    function calculerDureeResolution() {
        const dateDebut = document.getElementById('date_debut_traitement').value;
        const dateFin = document.getElementById('date_fin_traitement').value;

        if (dateDebut && dateFin) {
            const debut = new Date(dateDebut);
            const fin = new Date(dateFin);

            const difference = fin - debut;

            const jours = difference / (1000 * 60 * 60 * 24);

            document.getElementById('duree_resolution').value = jours ;
        } else {
            document.getElementById('duree_resolution').value = '';
        }
    }

    document.getElementById('date_debut_traitement').addEventListener('change', calculerDureeResolution);
    document.getElementById('date_fin_traitement').addEventListener('change', calculerDureeResolution);
</script>
@endsection
