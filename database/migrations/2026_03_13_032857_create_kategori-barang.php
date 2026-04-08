<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('subkategori');
            $table->string('icon');
        });

        DB::table('categories')->insert([
            [
                'kategori' => 'Internet',
                'subkategori' => 'Koneksi Terputus (RTO),Lambat / Bandwidth Limit,Masalah Router/Modem',
                'icon' => 'fa fa-wifi',
            ],
            [
                'kategori' => 'Hardware',
                'subkategori' => 'Komputer Mati Total,Printer / Scanner Rusak,Peripheral (Keyboard/Mouse)',
                'icon' => 'fa fa-microchip',
            ],
            [
                'kategori' => 'Software',
                'subkategori' => 'Error / Bug Aplikasi,Lisensi / Aktivasi,Lupa Password / Login',
                'icon' => 'fa fa-code',
            ],
            [
                'kategori' => 'AC',
                'subkategori' => 'Tidak Dingin,Bocor Air (Drip),Suara Berisik,Remote AC Rusak',
                'icon' => 'fa fa-snowflake-o',
            ],
            [
                'kategori' => 'Bangunan',
                'subkategori' => 'Masalah Kelistrikan Gedung,Kerusakan Lantai / Dinding,Atap Bocor',
                'icon' => 'fa fa-building',
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
