<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Rutorika\Sortable\SortableTrait;


	class Publication extends Model {
		use SortableTrait;
		protected static $sortableField = 'sort';

		protected $fillable = [
			'name',
			'name_fa',
			'description',
			'description_fa',
			'sort',
			'project_id',
		];

		public function thumbnail()
		{
			return $this->morphOne(Thumbnail::class, 'thumbnailable');
		}

		public function photos()
		{
			return $this->morphMany(Photo::class, 'photoable');
		}

		public function files()
		{
			return $this->hasMany(File::class);
		}

		public function project()
		{
			return $this->belongsTo(Project::class);
		}
	}
