<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('participant', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 100);
            $table->string('num_cni', 100);
            $table->integer('age');
            $table->char('sexe', 1)->default('M');
            $table->unsignedInteger('id_region');
            $table->string('login', 30);
            $table->string('pwd', 100);
            $table->string('email', 40)->nullable();
            $table->string('statut')->default('C');
            $table->boolean('etat')->default(true);
            $table->string('tel', 20)->nullable();
            $table->foreign(('id_region'))->references('id')->on('regions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant');
    }
};
