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
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regis_id')
                  ->constrained('regis')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();  
            $table->string('nama_dokter'); // Simpan username sebagai nama dokter
            $table->string('specialization')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dokter');
    }
    
};
