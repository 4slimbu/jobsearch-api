<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoreLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('core_locations', function(Blueprint $table)
		{
			$table->foreign('area_location_id', 'FK_area_loc_id_loc_id')->references('id')->on('core_locations')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('country_location_id', 'FK_country_loc_id_loc_id')->references('id')->on('core_locations')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('parent_location_id', 'FK_parent_location_id_location_id')->references('id')->on('core_locations')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('region_location_id', 'FK_region_loc_id_loc_id')->references('id')->on('core_locations')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('state_location_id', 'FK_state_loc_id_loc_id')->references('id')->on('core_locations')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('suburb_location_id', 'FK_suburb_loc_id_loc_id')->references('id')->on('core_locations')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('type', 'FK_type_location_types_type')->references('type')->on('core_location_types')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('core_locations', function(Blueprint $table)
		{
			$table->dropForeign('FK_area_loc_id_loc_id');
			$table->dropForeign('FK_country_loc_id_loc_id');
			$table->dropForeign('FK_parent_location_id_location_id');
			$table->dropForeign('FK_region_loc_id_loc_id');
			$table->dropForeign('FK_state_loc_id_loc_id');
			$table->dropForeign('FK_suburb_loc_id_loc_id');
			$table->dropForeign('FK_type_location_types_type');
		});
	}

}
