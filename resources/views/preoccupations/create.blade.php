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
    <input type="date" name="date_soumission" class="form-control" value="{{ date('Y-m-d') }}" required>
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
    <select name="progiciel_concerne" id="progiciel_concerne" class="form-control" required>
        <option value="">Sélectionnez un progiciel</option>
        <option value="SAP">SAP</option>
        <option value="Microsoft Dynamics">Microsoft Dynamics</option>
        <option value="Oracle E-Business Suite">Oracle E-Business Suite</option>
        <option value="Salesforce">Salesforce</option>
        <option value="Odoo">Odoo</option>
        <option value="Sage">Sage</option>
    </select>
</div>

<div class="form-group">
    <label for="module_concerne">Module Concerné</label>
    <select name="module_concerne" id="module_concerne" class="form-control" required>
        <option value="">Sélectionnez un module</option>
    </select>
</div>



        
        <div class="form-group">
            <label for="preuve">Preuve (Photo/Video)</label>
            <input type="file" name="preuve" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
        <a href="{{ route('preoccupations.index') }}" class="btn btn-secondary mt-3">Retour</a>
    </form>
    
</div>
<script>
    const modulesParProgiciel = {
        "SAP": [
            "Gestion financière",
            "Gestion des ressources humaines",
            "Gestion des approvisionnements",
            "Gestion de la production",
            "Ventes et distribution",
            "Gestion de la chaîne logistique",
            "Gestion des projets",
            "Contrôle de gestion"
        ],
        "Microsoft Dynamics": [
            "Finance et opérations",
            "Gestion des ventes et du marketing",
            "Service client",
            "Gestion de la chaîne d'approvisionnement",
            "Gestion de projets",
            "Ressources humaines",
            "Commerce"
        ],
        "Oracle E-Business Suite": [
            "Gestion financière",
            "Gestion de la chaîne d'approvisionnement",
            "Gestion des ressources humaines",
            "Ventes et marketing",
            "Gestion des projets",
            "Gestion de la fabrication",
            "Analyse commerciale",
            "Gestion des biens immobiliers"
        ],
        "Salesforce": [
            "Sales Cloud",
            "Service Cloud",
            "Marketing Cloud",
            "Commerce Cloud",
            "Analytics Cloud",
            "Community Cloud",
            "AppExchange"
        ],
        "Odoo": [
            "CRM",
            "Ventes",
            "Comptabilité",
            "Inventaire",
            "Ressources humaines",
            "Gestion de projets",
            "Marketing",
            "E-commerce"
        ],
        "Sage": [
            "Comptabilité",
            "Paie",
            "Gestion commerciale",
            "Gestion de production",
            "Gestion des actifs",
            "CRM",
            "Business Intelligence"
        ]
    };

    // Fonction pour mettre à jour la liste des modules en fonction du progiciel sélectionné
    document.getElementById('progiciel_concerne').addEventListener('change', function() {
        const progiciel = this.value;
        const moduleSelect = document.getElementById('module_concerne');
        
        // Vider le champ des modules avant de le remplir
        moduleSelect.innerHTML = '<option value=""> Sélectionnez un module </option>';

        // Si un progiciel est sélectionné, afficher les modules correspondants
        if (progiciel && modulesParProgiciel[progiciel]) {
            modulesParProgiciel[progiciel].forEach(module => {
                const option = document.createElement('option');
                option.value = module;
                option.textContent = module;
                moduleSelect.appendChild(option);
            });
        }
    });
</script>
@endsection
