@extends('layout')

@section('content')
<div class="container">
    <h1>Modifier la Préoccupation</h1>

    <form action="{{ route('preoccupations.update', $preoccupation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="auteur">Auteur</label>
            <input type="text" name="auteur" value="{{ $preoccupation->auteur }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" value="{{ $preoccupation->telephone }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="universite">Université</label>
            <input type="text" name="universite" value="{{ $preoccupation->universite }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="etablissement">Etablissement</label>
            <input type="text" name="etablissement" value="{{ $preoccupation->etablissement }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_soumission">Date de Soumission</label>
            <input type="date" name="date_soumission" value="{{ $preoccupation->date_soumission }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $preoccupation->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="preuve">Preuve</label>
            <input type="file" name="preuve" class="form-control">
            @if ($preoccupation->preuve)
                <p>Preuve actuelle : <a href="{{ asset('storage/' . $preoccupation->preuve) }}" target="_blank">Voir</a></p>
            @endif
        </div>

        <div class="form-group">
            <label for="priorite">Priorité</label>
            <select name="priorite" class="form-control" required>
                <option value="basse" {{ $preoccupation->priorite == 'basse' ? 'selected' : '' }}>Basse</option>
                <option value="moyenne" {{ $preoccupation->priorite == 'moyenne' ? 'selected' : '' }}>Moyenne</option>
                <option value="haute" {{ $preoccupation->priorite == 'haute' ? 'selected' : '' }}>Haute</option>
            </select>
        </div>

        <div class="form-group">
    <label for="gestionnaire_nom">Gestionnaire</label>
    <input type="text" id="gestionnaire_nom" name="gestionnaire_nom" value="{{ Auth::user()->name }}" class="form-control" readonly>
</div>


<div class="form-group">
    <label for="methode_resolution">Méthode de Résolution</label>
    <select name="methode_resolution" class="form-control" required>
        <option value="">Sélectionnez une méthode</option>
        <option value="Résolution Directe" {{ $preoccupation->methode_resolution == 'Résolution Directe' ? 'selected' : '' }}>Résolution Directe</option>
        <option value="Escalade" {{ $preoccupation->methode_resolution == 'Escalade' ? 'selected' : '' }}>Escalade</option>
        <option value="Analyse et Plan d’Action" {{ $preoccupation->methode_resolution == 'Analyse et Plan d’Action' ? 'selected' : '' }}>Analyse et Plan d’Action</option>
        <option value="Médiation" {{ $preoccupation->methode_resolution == 'Médiation' ? 'selected' : '' }}>Médiation</option>
        <option value="Formation et Sensibilisation" {{ $preoccupation->methode_resolution == 'Formation et Sensibilisation' ? 'selected' : '' }}>Formation et Sensibilisation</option>
        <option value="Documentation et Suivi" {{ $preoccupation->methode_resolution == 'Documentation et Suivi' ? 'selected' : '' }}>Documentation et Suivi</option>
        <option value="Feedback et Amélioration Continue" {{ $preoccupation->methode_resolution == 'Feedback et Amélioration Continue' ? 'selected' : '' }}>Feedback et Amélioration Continue</option>
    </select>
</div>


        <div class="form-group">
            <label for="module_concerne">Module Concerné</label>
            <input type="text" name="module_concerne" value="{{ $preoccupation->module_concerne }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="progiciel_concerne">Progiciel Concerné</label>
            <input type="text" name="progiciel_concerne" value="{{ $preoccupation->progiciel_concerne }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_debut_traitement">Date de Début de Traitement</label>
            <input type="date" id="date_debut_traitement" name="date_debut_traitement" value="{{ $preoccupation->date_debut_traitement }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_fin_traitement">Date de Fin de Traitement</label>
            <input type="date" id="date_fin_traitement" name="date_fin_traitement" value="{{ $preoccupation->date_fin_traitement }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="duree_resolution">Durée de Résolution (en jours)</label>
            <input type="text" id="duree_resolution" name="duree_resolution" value="{{ $preoccupation->duree_resolution }}" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" class="form-control" required>
                <option value="en cours" {{ $preoccupation->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="résolu" {{ $preoccupation->status == 'résolu' ? 'selected' : '' }}>Résolu</option>
                <option value="non résolu" {{ $preoccupation->status == 'non résolu' ? 'selected' : '' }}>Non résolu</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('preoccupations.index') }}" class="btn btn-secondary mt-3">Retour</a>
    </form>
</div>
<script>
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
