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
        Schema::create('event_class', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('school_class_id');
            $table->unsignedInteger('teacher_id');
            $table->string('course');
            $table->string('weak_day');
            $table->dateTime('time_start');
            $table->dateTime('time_end'); 
            $table->unsignedInteger('event_content_id');
            $table->timestamps();
        });

        // Schema::table('event_class', function (Blueprint $table) {
        //     $table->foreign('school_class_id')->references('id')->on('classes');
        //     $table->foreign('teacher_id')->references('id')->on('teachers');
        //     $table->foreign('event_content_id')->references('id')->on('event_content');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_class');
    }
};
