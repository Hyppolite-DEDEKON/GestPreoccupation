@extends('layout')

@section('content')
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Créer une Préoccupation</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('preoccupations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="auteur">Auteur</label>
            <input type="text" name="auteur" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="universite">Université</label>
            <input type="text" name="universite" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="etablissement">Etablissement</label>
            <input type="text" name="etablissement" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_soumission">Date de Soumission</label>
            <input type="date" name="date_soumission" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="priorite">Priorité</label>
            <select name="priorite" class="form-control" required>
                <option value="basse">Basse</option>
                <option value="moyenne">Moyenne</option>
                <option value="haute">Haute</option>
            </select>
        </div>
        <div class="form-group">
            <label for="progiciel_concerne">Progiciel Concerné</label>
            <input type="text" name="progiciel_concerne" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="module_concerne">Module Concerné</label>
            <input type="text" name="module_concerne" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="preuve">Preuve (Photo/Video)</label>
            <input type="file" name="preuve" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
        <a href="{{ route('preoccupations.index') }}" class="btn btn-secondary mt-3">Retour</a>
    </form>
    
</div>
@endsection
