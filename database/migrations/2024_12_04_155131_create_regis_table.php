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
        Schema::create('regis', function (Blueprint $table) {
            $table->id(); // <--- INI regis_id (id utama tabel)
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role', ['dokter', 'perawat']); // Pakai huruf kecil biar konsisten
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regis');
    }
};
