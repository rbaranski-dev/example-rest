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
        Schema::create('firmy', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
            $table->string('nip');
            $table->string('adres');
            $table->string('miasto');
            $table->string('kod_pocztowy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firmy');
    }
};
