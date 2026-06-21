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
        Schema::create('paket_umrahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tipe')->default('reguler'); // reguler, plus, vip
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 15, 2)->default(0);
            $table->integer('durasi')->default(9); // jumlah hari
            $table->string('hotel')->nullable();
            $table->string('maskapai')->nullable();
            $table->string('tanggal_berangkat')->nullable();
            $table->string('lokasi_keberangkatan')->default('Jakarta');
            $table->json('fasilitas')->nullable();
            $table->json('itinerary')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('aktif'); // aktif, nonaktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_umrahs');
    }
};
