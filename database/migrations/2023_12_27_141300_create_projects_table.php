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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('summary',255)->nullable();
            $table->enum('type',['compound','apartment'])->default('compound')->comment('compound=off plan project, apartment=exclusive properties');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('cover_image')->nullable();
            $table->string('price')->nullable();
            $table->string('manager')->nullable();
            $table->text('manager_description')->nullable();
            $table->string('manager_image')->nullable();
            $table->string('location_image')->nullable();
            $table->string('gps_location')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
