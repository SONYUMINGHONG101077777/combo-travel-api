<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->text('description')->nullable();   // short blurb — shown on the card
            $table->text('description1')->nullable();   // long intro — shown in the dialog
            $table->text('description2')->nullable();   // location/village note — shown in the dialog
            $table->string('img')->nullable();           // main card image
            $table->string('img1')->nullable();           // dialog hero image
            $table->string('img2')->nullable();           // small pin/marker icon used in the dialog
            $table->unsignedInteger('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};