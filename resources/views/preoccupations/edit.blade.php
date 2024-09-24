
@extends('layout')

@section('content')
<div class="container">
    <h1>Modifier la Préoccupation</h1>

    <form action="{{ route('preoccupations.update', $preoccupation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Le même formulaire que create.blade.php, mais pré-rempli avec les données existantes -->
        <!-- Ajouter les inputs pré-remplis avec $preoccupation->valeur -->
        
        <!-- Exemple -->
        <div class="form-group">
            <label for="auteur">Auteur</label>
            <input type="text" name="auteur" value="{{ $preoccupation->auteur }}" class="form-control" required>
        </div>

        <!-- Répéter pour les autres champs... -->

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
