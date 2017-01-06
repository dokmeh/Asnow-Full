<?php

	use App\Request;
	use Illuminate\Database\Seeder;

	class RequestTableSeeder extends Seeder {
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			Request::truncate();
			factory(Request::class, 10)->create();
		}
	}
