<?php

	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class CreateAwardsTable extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('awards', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->string('name_fa');
				$table->text('description');
				$table->text('description_fa');
				$table->enum('visible', [0, 1]);
				$table->integer('date');
				$table->integer('sort');
				$table->integer('project_id')->unsigned();
				$table->foreign('project_id')->references('id')->on('projects')->onDelete('CASCADE')->onUpdate('CASCADE');
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
			Schema::dropIfExists('awards');
		}
	}
