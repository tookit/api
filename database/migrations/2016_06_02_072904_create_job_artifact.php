<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobArtifact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('job_artifact', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('version');
            $table->string('manifest');
            $table->text('shellscript');
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
        Schema::drop('job_artifact');
    }
}
