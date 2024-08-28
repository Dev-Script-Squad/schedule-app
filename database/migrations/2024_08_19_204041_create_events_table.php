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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->unsignedInteger('school_class_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('student_id')->nullable();
            $table->unsignedInteger('event_content_id');
            $table->timestamps();
        });

        // Schema::table('events', function (Blueprint $table) {
        //     $table->foreign('school_class_id')->references('id')->on('classes');
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->foreign('student_id')->references('id')->on('students');
        //     $table->foreign('event_content_id')->references('id')->on('event_content');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
