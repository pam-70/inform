<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('login',20)->nullable();
            $table->string('password_str',10)->nullable();
            $table->string('fio')->nullable();
            $table->integer('klass')->nullable();
            $table->string('pol',10)->nullable();
            $table->string('rezult',10)->nullable();
            $table->date('date_reg')->nullable();
            $table->date('date_rezult')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
