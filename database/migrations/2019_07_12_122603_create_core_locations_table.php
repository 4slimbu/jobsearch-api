<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoreLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('core_locations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_location_id')->unsigned()->nullable()->index('IDX_core_locations_parent_location_id');
			$table->string('type', 191)->index('IDX_core_locations_type');
			$table->string('label', 191)->nullable()->index('IDX_core_locations_label');
			$table->string('display_label', 191)->nullable()->index('FTS_core_locations_display_label');
			$table->integer('suburb_location_id')->unsigned()->nullable()->index('IDX_core_locations_suburb_loc_id');
			$table->string('suburb_name', 191)->nullable()->index('IDX_core_locations_suburb_name');
			$table->integer('area_location_id')->unsigned()->nullable()->index('IDX_core_locations_area_loc_id');
			$table->string('area_name', 191)->nullable()->index('IDX_core_locations_area_name');
			$table->integer('region_location_id')->unsigned()->nullable()->index('IDX_core_locations_region_loc_id');
			$table->string('region_name', 191)->nullable()->index('IDX_core_locations_region_name');
			$table->integer('state_location_id')->unsigned()->nullable()->index('IDX_core_locations_state_loc_id');
			$table->string('state_code', 191)->nullable()->index('IDX_core_locations_state_code');
			$table->string('state_name', 191)->nullable()->index('IDX_core_locations_state_name');
			$table->integer('country_location_id')->unsigned()->nullable()->index('IDX_core_locations_country_loc_id');
			$table->string('country_code', 3)->nullable()->index('IDX_core_locations_country_code');
			$table->string('country_name', 191)->nullable()->index('IDX_core_locations_country_name');
			$table->string('post_code', 11)->nullable()->index('IDX_core_locations_post_code');
			$table->decimal('latitude', 10, 8)->nullable();
			$table->decimal('longitude', 11, 8)->nullable();
			$table->integer('available_jobs');
			$table->integer('population_aggregated');
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
		Schema::drop('core_locations');
	}

}
