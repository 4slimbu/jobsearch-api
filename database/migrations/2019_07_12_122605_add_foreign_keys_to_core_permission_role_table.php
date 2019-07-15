<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorePermissionRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('core_permission_role', function(Blueprint $table)
		{
//			$table->foreign('permission_id')->references('id')->on('core_permissions')->onUpdate('RESTRICT')->onDelete('CASCADE');
//			$table->foreign('role_id')->references('id')->on('core_roles')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('core_permission_role', function(Blueprint $table)
		{
//			$table->dropForeign('core_permission_role_permission_id_foreign');
//			$table->dropForeign('core_permission_role_role_id_foreign');
		});
	}

}
