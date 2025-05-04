<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->unique(['student_id', 'course_id']);
        });
    }
    
    public function down()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->dropUnique(['student_id', 'course_id']);
        });
    }
    
};
