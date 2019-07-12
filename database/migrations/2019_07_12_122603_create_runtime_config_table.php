<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRuntimeConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('runtime_config', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100)->index();
			$table->string('value', 191)->index('IDX_blacklist_value');
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
		Schema::drop('runtime_config');
	}

}
