<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Award extends Model {

		protected $fillable = [
			'name',
			'description',
			'date',
			'project_id',
		];

		public function photo()
		{
			return $this->morphOne(Photo::class, 'photoable');
		}

		public function project()
		{
			return $this->belongsTo(Project::class);
		}
	}
