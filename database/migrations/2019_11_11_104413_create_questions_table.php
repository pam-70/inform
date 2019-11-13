<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('n_ts')->nullable();
            $table->integer('tema')->nullable();
            $table->integer('vid_vopr')->nullable();
            $table->text('vopr')->nullable();
            $table->text('vo1')->nullable();
            $table->text('vo2')->nullable();
            $table->text('vo3')->nullable();
            $table->text('vo4')->nullable();
            $table->string('pis_otv')->nullable();
            $table->string('ris')->nullable();
            $table->integer('po1')->nullable();
            $table->integer('po2')->nullable();
            $table->integer('po3')->nullable();
            $table->integer('po4')->nullable();
            $table->integer('bal')->nullable();            
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
        Schema::dropIfExists('questions');
    }
}
