<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('no_ticket');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('sub_kategori');
            $table->string('keterangan');
            $table->string('pictures')->nullable();
            $table->enum('status', ['Pending', 'In Progress', 'Resolved', 'Closed'])->default('Pending');
            $table->enum('action', ['Waiting', 'Approved', 'Rejected', 'Revision'])->default('Waiting');
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
