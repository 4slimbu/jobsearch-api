<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoreUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('core_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name', 191)->nullable();
			$table->string('last_name', 191)->nullable();
			$table->string('email', 191)->unique('UNQ_core_users_email');
			$table->string('username', 20)->nullable()->unique('UNQ_core_users_username');
			$table->enum('gender', array('male','female'))->nullable();
			$table->string('contact_number')->nullable();
			$table->text('preferences', 16777215)->nullable();
			$table->string('password', 128)->default('');
			$table->boolean('verified')->default(0);
			$table->string('email_token', 25)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->boolean('is_active')->default(1);
			$table->string('profile_pic')->nullable();
			$table->bigInteger('fb_id')->nullable();
			$table->string('device_id')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->dateTime('last_login_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('core_users');
	}

}