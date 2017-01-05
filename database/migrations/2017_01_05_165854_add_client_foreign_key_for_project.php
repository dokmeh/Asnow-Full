<?php

	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class AddClientForeignKeyForProject extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::table('projects', function (Blueprint $table) {
				$table->integer('client_id')->unsigned()->nullable();
				$table->foreign('client_id')->references('id')->on('clients')->onUpdate('CASCADE');


			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			//
		}
	}
