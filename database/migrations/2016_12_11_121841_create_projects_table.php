<?php

	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class CreateProjectsTable extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('projects', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title');
				$table->string('title_fa');
				$table->string('location');
				$table->string('location_fa');
				$table->string('client');
				$table->string('client_fa');
				$table->text('description');
				$table->text('description_fa');
				$table->string('design_at');
				$table->string('completed_at');
				$table->integer('site_area');
				$table->integer('floor_area');
				$table->integer('sort');
				$table->integer('category_id')->unsigned();
				$table->integer('status_id')->unsigned();
				$table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE')->onUpdate('CASCADE');
				$table->foreign('status_id')->references('id')->on('statuses')->onDelete('CASCADE')->onUpdate('CASCADE');

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
			Schema::dropIfExists('projects');
		}
	}
