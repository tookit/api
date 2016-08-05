<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function(Blueprint $table) {
            $table->increments('id');
            $table->char('key',40)->unique();
            $table->integer('resource_id');
            $table->string('name')->unique();
            $table->text('description');
            $table->string('hostname');
            $table->ipAddress('ip');
            $table->macAddress('mac');
            $table->string('platform');
            $table->enum('status',['online','offline'])->default('offline');
            $table->enum('is_approved',['Yes','No'])->default('No');
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
        Schema::drop('agents');
    }
}
