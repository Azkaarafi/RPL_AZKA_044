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
        Schema::create('perawat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regis_id')
                  ->constrained('regis')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();  
            $table->string('nama_perawat'); // Simpan username sebagai nama perawat
            $table->string('department')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('perawat');
    }

};
