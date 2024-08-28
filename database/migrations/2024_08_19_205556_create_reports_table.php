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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->dateTime('date');
            $table->string('type');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('event_school_class_id');
            $table->timestamps();
        });

        // Schema::table('events', function (Blueprint $table) {
        //     $table->foreign('event_school_class_id')->references('id')->on('event_class');
        //     $table->foreign('student_id')->references('id')->on('students');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
