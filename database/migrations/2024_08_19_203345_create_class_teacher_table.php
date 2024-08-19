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
        Schema::create('class_teacher', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('teacher_id');
            $table->timestamps();
        });

        // Schema::table('class_teacher', function (Blueprint $table) {
            //     $table->foreign('class_id')->references('id')->on('classes');
            //     $table->foreign('teacher_id')->references('id')->on('teachers');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_teacher');
    }
};
