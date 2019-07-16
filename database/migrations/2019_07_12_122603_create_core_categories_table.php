<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoreCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('core_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent')->nullable();
			$table->string('name')->nullable();
			$table->boolean('sort_order')->nullable();
			$table->string('icon', 50)->nullable();
			$table->text('description')->nullable();
			$table->boolean('status')->nullable();
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
		Schema::drop('core_categories');
	}

}
