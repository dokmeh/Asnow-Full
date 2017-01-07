<?php

	use Illuminate\Database\Seeder;

	class DatabaseSeeder extends Seeder {
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			$this->call(CategoryTableSeeder::class);
			$this->call(StatusTableSeeder::class);
			$this->call(ClientTableSeeder::class);
			$this->call(ProjectTableSeeder::class);
			$this->call(RequestTableSeeder::class);
		}
	}
