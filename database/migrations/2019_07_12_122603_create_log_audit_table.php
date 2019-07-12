<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogAuditTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_audit', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('application_code', 16)->nullable();
			$table->string('context', 191)->default('')->index('context')->comment('A label describing/identifying the request');
			$table->text('data', 16777215)->nullable()->comment('Information pertaining to the audit subject');
			$table->string('state', 191)->nullable()->index('state')->comment('State detail, for example; Sent, Error, Aborted');
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
		Schema::drop('log_audit');
	}

}
