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
        Schema::create('tabungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan tabel users
            $table->string('judul'); // Judul tabungan
            $table->string('foto')->nullable(); // Foto tabungan
            $table->decimal('target_nominal', 15, 2); // Target nominal tabungan
            $table->date('target_tanggal'); // Target tanggal tabungan tercapai
            // $table->decimal('nominal_terkumpul', 15, 2)->default(0); // Nominal yang terkumpul saat ini
            // $table->boolean('tercapai')->default(false); // Status tercapai
            $table->unsignedBigInteger('nominal_terkumpul')->default(0);
            $table->boolean('tercapai')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabungans');
    }
};
