<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobScheduler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('job_scheduler', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('starts_at');
            $table->bigInteger('ends_at');
            $table->integer('repeat_count');
            $table->integer('repeat_interval');
            $table->enum('repeat_unit',['s','m','h','D','W','M','Y'])->default('s');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('job_scheduler');
    }
}
