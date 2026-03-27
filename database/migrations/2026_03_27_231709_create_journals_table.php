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
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('class_id')->constrained('classrooms');
            $table->foreignId('subject_id')->constrained();
            $table->date('tanggal');
            $table->string('pokok_bahasan')->nullable();
            $table->string('sub_pokok')->nullable();
            $table->string('metode')->nullable();
            $table->string('jam_ke')->nullable();
            $table->string('sumber')->nullable();
            $table->enum('keterangan', ['Tuntas', 'Tidak Tuntas'])->default('Tuntas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};
