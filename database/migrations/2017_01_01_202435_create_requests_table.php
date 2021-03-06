<?php

	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class CreateRequestsTable extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('requests', function (Blueprint $table) {
				$table->increments('id');
				$table->string('request_type');
				$table->string('name');
				$table->text('other_request')->nullable();
				$table->integer('phone');
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
			Schema::dropIfExists('requests');
		}
	}
