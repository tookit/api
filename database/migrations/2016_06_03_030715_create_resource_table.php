<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('agent_key');
            $table->string('region_code',30);
            $table->string('availability_zone',30);
            $table->string('ami_id',30);
            $table->string('vpc_id',30);
            $table->string('instance_type',20);
            $table->json('security_groups');
            $table->ipAddress('last_ip_address');
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
        //
        Schema::drop('resource');
    }
}
