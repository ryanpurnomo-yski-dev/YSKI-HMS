<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pages')->nullable();
            $table->string('urls')->nullable();
            $table->string('icons')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('master_roles')->insert([
            [
                'name' => 'SuperAdmin',
                'pages' => 'Data Barang,Riwayat Permintaan,My Tickets,Kategori',
                'urls' => '/user/items,/user/requests,/user/tickets,/user/category',
                'icons' => 'fas fa-box,fas fa-history,fas fa-ticket-alt,fas fa-tags',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin',
                'pages' => 'Data Barang,My Tickets',
                'urls' => '/user/items,/user/tickets',
                'icons' => 'fas fa-box,fas fa-ticket-alt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Staff',
                'pages' => 'Riwayat Permintaan,My Tickets',
                'urls' => '/user/requests,/user/tickets',
                'icons' => 'fas fa-history,fas fa-ticket-alt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('master_roles');
        Schema::enableForeignKeyConstraints();
    }
};
