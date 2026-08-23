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
        Schema::create('electricity_readings', function (Blueprint $table) {
            $table->id();

            $table->decimal('voltage', 8, 2)->nullable();
            $table->decimal('current', 8, 2)->nullable();
            $table->decimal('power', 10, 2)->nullable();

            $table->string('status')->default('normal');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electricity_readings');
    }
};
