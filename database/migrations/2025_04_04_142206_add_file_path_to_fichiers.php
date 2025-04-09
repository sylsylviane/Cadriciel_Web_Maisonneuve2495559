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
        Schema::table('fichiers', function (Blueprint $table) {
            $table->string('file_path')->nullable()->after('title'); // Ajout de la colonne file_path
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fichiers', function (Blueprint $table) {
            $table->dropColumn('file_path'); // Suppression de la colonne file_path
        });
    }
};
