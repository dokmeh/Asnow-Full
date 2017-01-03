<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('projects', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('title_fa')->nullable();
			$table->string('location');
			$table->string('location_fa')->nullable();
			$table->string('client');
			$table->string('client_fa')->nullable();
			$table->text('description');
			$table->text('description_fa')->nullable();
			$table->string('design_at');
			$table->string('completed_at')->nullable();
			$table->integer('site_area');
			$table->integer('floor_area');
			$table->enum('visible', [0, 1]);
			$table->integer('position');
			$table->integer('category_id')->unsigned();
			$table->integer('status_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE');
			$table->foreign('status_id')->references('id')->on('statuses')->onUpdate('CASCADE');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('projects');
	}
}
