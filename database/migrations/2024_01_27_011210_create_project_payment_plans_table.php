<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_payment_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Project::class)->constrained()->cascadeOnDelete();

            $table->string('step')->nullable()->comment('payment step name or date');
            $table->string('name')->nullable()->comment('the name of the payment');
            $table->text('description')->nullable()->comment('the description of the payment');
            $table->double('price')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_payment_plans');
    }
};
