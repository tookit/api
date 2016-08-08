<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job', function(Blueprint $table) {
            $table->increments('id');
            $table->char('agent_key',40);
            $table->integer('scheduler_id');
            $table->integer('artifact_id');
            $table->string('name')->unique();
            $table->text('description');
            $table->enum('status',['Ready','Scheduled','Running','Completed'])->default('Ready');
            $table->softDeletes();
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
		Schema::drop('job');
	}

}
