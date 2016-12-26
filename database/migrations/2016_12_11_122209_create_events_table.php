<?php

	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class CreateEventsTable extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('events', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->string('name_fa')->nullable();
				$table->date('date');
				$table->enum('visible', [0, 1]);
				$table->text('description');
				$table->text('description_fa')->nullable();
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
			Schema::dropIfExists('events');
		}
	}
