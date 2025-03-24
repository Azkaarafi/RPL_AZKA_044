<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->integer('usia');
            $table->decimal('biaya_pengobatan', 15, 2);
            $table->string('image')->nullable();
            $table->date('tanggal_periksa');
            $table->text('catatan')->nullable();
            
            // Relasi dengan dokter & perawat
            $table->foreignId('dokter_id')
                  ->nullable()
                  ->constrained('dokter')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            
            $table->foreignId('perawat_id')
                  ->nullable()
                  ->constrained('perawat')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
