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
        Schema::create('pengajuan_lemburs', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('karyawan_id'); // Foreign Key ke tabel karyawans
            $table->date('tanggal_lembur'); // Tanggal lembur
            $table->time('jam_mulai'); // Waktu mulai lembur
            $table->time('jam_selesai'); // Waktu selesai lembur
            $table->integer('total_jam_lembur'); // Total jam lembur
            $table->text('keterangan')->nullable(); // Keterangan lembur
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status lembur
            $table->timestamps(); // created_at dan updated_at
        
            // Tambahkan foreign key constraint
            
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_lemburs');
    }
};
