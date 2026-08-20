<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image');            // path/URL to the background image
            $table->string('badge_text')->nullable(); // small pill text above the title, e.g. "ស្វែងយល់កម្ពុជា"
            $table->string('title');            // main heading shown over the image
            $table->string('link')->nullable(); // optional destination when the banner is clicked
            $table->unsignedInteger('order')->default(0); // display order (controls dot sequence)
            $table->boolean('is_active')->default(true);  // toggle visibility without deleting
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};