<?php

	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class CreateCooperatorsTable extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('cooperators', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title');
				$table->string('title_fa')->nullable();
				$table->longText('url');
				$table->enum('visible', [0, 1]);
				$table->integer('position');
				$table->integer('category_id')->unsigned();
				$table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE');
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
			Schema::dropIfExists('cooperators');
		}
	}
