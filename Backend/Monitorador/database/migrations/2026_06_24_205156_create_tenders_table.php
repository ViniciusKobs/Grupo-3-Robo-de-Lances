<?php

// Tender é a tradução de licitação

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
        Schema::create('Tenders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('url');
            $table->uuid('platform_id');
            $table->foreign('platform_id')->references('id')->on('Platforms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Tenders');
    }
};
