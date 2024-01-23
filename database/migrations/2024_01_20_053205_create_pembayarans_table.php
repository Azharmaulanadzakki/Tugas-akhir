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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mapel_id');
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            // Tambahkan kolom-kolom lain yang dibutuhkan
            $table->timestamps();

            // Definisikan foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('mapel_id')->references('id')->on('mapels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
