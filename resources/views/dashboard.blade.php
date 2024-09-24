@extends('layout')

@section('content')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Acceuil') }}
        </h2>
    </x-slot>
    <div class="mt-8">
                        <a href="{{ route('preoccupations.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            {{ __('Enregistrer une Préoccupation') }}
                        </a>
                    </div>
                    <div class="mt-6">
        <h2 class="font-semibold text-xl mb-4">Mettre à Jour le Profil Utilisateur</h2>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        </form>
    </div>
<div class="container mx-auto py-12">
    <h1 class="text-2xl font-bold mb-6">Tableau de Bord des Préoccupations</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total des Préoccupations -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="font-semibold text-lg">Total des Préoccupations</h2>
            <p class="text-4xl text-blue-600">150</p>
        </div>

        <!-- Total des Préoccupations Résolues -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="font-semibold text-lg">Total des Préoccupations Résolues</h2>
            <p class="text-4xl text-green-600">100</p>
        </div>

        <!-- Total des Préoccupations Non Résolues -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="font-semibold text-lg">Total des Préoccupations Non Résolues</h2>
            <p class="text-4xl text-red-600">50</p>
        </div>
    </div>

    <div class="mt-6">
        <h2 class="font-semibold text-xl mb-4">Évaluation de la Performance des Gestionnaires</h2>
        <div class="bg-white p-4 rounded-lg shadow">
            <p>Gestionnaire 1: 80%</p>
            <p>Gestionnaire 2: 90%</p>
            <p>Gestionnaire 3: 75%</p>
        </div>
    </div>

    <div class="mt-6">
        <h2 class="font-semibold text-xl mb-4">Graphique de Performance Mensuelle</h2>
        <div class="bg-white p-4 rounded-lg shadow">
            <canvas id="monthlyPerformanceChart" style="height: 300px;"></canvas>
        </div>
    </div>

    
</div>

<script>
    // Exemple de données pour le graphique
    const ctx = document.getElementById('monthlyPerformanceChart').getContext('2d');
    const monthlyPerformanceChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
            datasets: [{
                label: 'Préoccupations Résolues',
                data: [30, 50, 20, 40, 70, 60],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</x-app-layout>
@endsection
