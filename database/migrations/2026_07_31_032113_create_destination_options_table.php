<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destination_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')
                ->constrained()
                ->cascadeOnDelete(); // deleting a destination removes its options too
            $table->enum('type', ['Resort', 'Camping','Hotel','Means of transport']);
            $table->string('img')->nullable();
            $table->text('text')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destination_options');
    }
};