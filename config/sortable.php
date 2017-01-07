<?php

	use App\Cooperator;
	use App\Publication;
	use App\Project;
	use App\Photo;
	use App\Award;

	return [
		'entities' => [
			'projects'     => Project::class,
			'photos'       => Photo::class,
			'awards'       => Award::class,
			'publications' => Publication::class,
			'cooperators'  => Cooperator::class,
			//			'projects' => ['entity' => '\App\Project', 'relation' => 'photos'],
		],
	];
