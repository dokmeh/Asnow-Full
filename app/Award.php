<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Rutorika\Sortable\SortableTrait;


	class Award extends Model {
		use SortableTrait;
		protected static $sortableField = 'sort';

		protected $fillable = [
			'name',
			'name_fa',
			'visible',
			'description',
			'description_fa',
			'date',
			'sort',
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
