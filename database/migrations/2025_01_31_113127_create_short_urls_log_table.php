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
        Schema::create('short_urls_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('url_id'); // ID from the short_urls table
            $table->string('ip');   // IP Address
            $table->string('browser');  //  agent
            $table->string('platform'); // OS
            $table->string('referrer')->nullable(); // referrer            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_urls_log');
    }
};
