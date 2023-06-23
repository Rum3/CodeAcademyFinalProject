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
        if(!Schema::hasTable('trainings'))
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('training_title');
            $table->text('description');
            $table->date('start_date')->default(now());
            $table->date('end_date')->default(now());
            $table->integer('estimate')->default(10);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
