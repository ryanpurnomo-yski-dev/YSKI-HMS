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
        Schema::create('barang', function (Blueprint $table) {
            // Kolom 'id' sebagai Primary Key (Auto Increment)
            $table->id(); 

            $table->string('kode_barang', 50)->unique(); 

            $table->string('kategori_barang');
            
            $table->string('nama_barang');

            $table->string('merk_barang');

            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
