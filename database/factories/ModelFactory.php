<?php

	/*
	|--------------------------------------------------------------------------
	| Model Factories
	|--------------------------------------------------------------------------
	|
	| Here you may define all of your model factories. Model factories give
	| you a convenient way to create models for testing and seeding your
	| database. Just tell the factory how a default model should look.
	|
	*/

	/** @var \Illuminate\Database\Eloquent\Factory $factory */
	$factory->define(App\User::class, function (Faker\Generator $faker) {
		static $password;

		return [
			'name'           => $faker->name,
			'email'          => $faker->unique()->safeEmail,
			'password'       => $password ?: $password = bcrypt('secret'),
			'remember_token' => str_random(10),
		];
	});

	$factory->define(App\Category::class, function (Faker\Generator $faker) {
		return [
			'name'    => $faker->firstName,
			'name_fa' => $faker->firstName,
		];
	});

	$factory->define(App\Status::class, function (Faker\Generator $faker) {
		return [
			'name' => $faker->firstName,

		];
	});

	$factory->define(App\Client::class, function (Faker\Generator $faker) {
		return [
			'name'    => $faker->firstName,
			'name_fa' => $faker->firstName,
			'url'     => $faker->url,

		];
	});

	$factory->define(App\Request::class, function (Faker\Generator $faker) {
		return [
			'request_type' => 'order_request',
			'name'         => $faker->firstName,
			'phone'        => $faker->phoneNumber,

		];
	});

	$factory->define(App\Project::class, function (Faker\Generator $faker) {
		return [
			'title'          => $faker->name,
			'title_fa'       => $faker->name,
			'location'       => $faker->city,
			'location_fa'    => $faker->city,
			'description'    => $faker->text,
			'description_fa' => $faker->text,
			'design_at'      => $faker->dateTime,
			'completed_at'   => $faker->dateTime,
			'site_area'      => $faker->numberBetween('100', '500'),
			'floor_area'     => $faker->numberBetween('100', '500'),
			'visible'        => 1,
			'category_id'    => 1,
			'status_id'      => 1,
			'client_id'      => 1,

		];
	});





