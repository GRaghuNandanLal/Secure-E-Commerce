<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sql_execution_results', function (Blueprint $table) {
            $table->id();
            $table-> string("student_id");
            $table->text('code');
            $table->text('output')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sql_execution_results');
    }
};
