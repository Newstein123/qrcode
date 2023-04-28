<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qr_designs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_code_id')->constrained('qr_codes')->onDelete('cascade');
            $table->json('qr_design')->nullable();
            $table->string('qr_logo')->nullable();
            $table->string('frame')->nullable();
            $table->string('template')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qr_designs');
    }
};
