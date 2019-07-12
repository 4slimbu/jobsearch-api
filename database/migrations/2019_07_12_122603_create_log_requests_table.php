<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_requests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('context', 191)->default('')->index('context')->comment('A label describing/identifying the request');
			$table->string('response_code', 10)->nullable()->comment('The HTTP response code sent');
			$table->text('request_url', 65535)->nullable()->comment('The URL requested');
			$table->text('request_origin', 65535)->nullable()->comment('The host information of the request caller');
			$table->text('content', 65535)->nullable()->comment('The content of the request');
			$table->text('response', 65535)->nullable()->comment('The content of the response message');
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
		Schema::drop('log_requests');
	}

}
