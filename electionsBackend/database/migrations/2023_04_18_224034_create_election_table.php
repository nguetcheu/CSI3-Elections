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
        Schema::create('election', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date',50);
            $table->string('statut')->default('ouvert');
            $table->string('label',100);
            $table->string('description',300);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election');
    }
};
