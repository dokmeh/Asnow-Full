<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Rutorika\Sortable\SortableTrait;


	class Award extends Model {
		use SortableTrait;

		protected $fillable = [
			'name',
			'hwllo',
			'name_fa',
			'visible',
			'description',
			'description_fa',
			'date',
			'position',
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
