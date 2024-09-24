<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreoccupationsTable extends Migration
{
    public function up()
    {
        Schema::create('preoccupations', function (Blueprint $table) {
            $table->id();
            $table->string('auteur');
            $table->string('telephone');
            $table->string('universite');
            $table->string('etablissement');
            $table->date('date_soumission');
            $table->text('description');
            $table->string('preuve')->nullable();  // Photo ou vidéo
            $table->enum('priorite', ['basse', 'moyenne', 'haute']);
            $table->foreignId('gestionnaire_id')->nullable()->constrained('users'); // Le gestionnaire de la préoccupation
            $table->text('methode_resolution')->nullable();
            $table->string('module_concerne');
            $table->string('progiciel_concerne');
            $table->date('date_debut_traitement')->nullable();
            $table->date('date_fin_traitement')->nullable();
            $table->integer('duree_resolution')->nullable(); // Durée en jours
            $table->enum('status', ['ouverte', 'en_cours', 'resolue'])->default('ouverte');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('preoccupations');
    }
}
