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
        Schema::create('menabungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan tabel users
            $table->foreignId('tabungan_id')->constrained()->onDelete('cascade'); // Relasi dengan tabel tabungans
            $table->decimal('nominal', 15, 2); // Nominal yang ditabung
            $table->date('tanggal'); // Tanggal menabung
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menabungs');
    }
};
