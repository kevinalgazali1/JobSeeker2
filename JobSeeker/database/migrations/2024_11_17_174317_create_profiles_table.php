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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('jobpost_id')->constrained('jobposts')->onDelete('cascade');
            $table->string('nama');
            $table->string('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('kabkota');
            $table->string('provinsi');
            $table->integer('kodepos');
            $table->string('email');
            $table->bigInteger('hp');
            $table->text('gambarcv');
            $table->string('status')->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
