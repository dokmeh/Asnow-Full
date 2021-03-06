<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Rutorika\Sortable\SortableTrait;


	class Publication extends Model {
		use SortableTrait;

		protected $fillable = [
			'name',
			'name_fa',
			'description',
			'visible',
			'description_fa',
			'position',
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
			return $this->morphMany(File::class, 'fileable');
		}

		public function project()
		{
			return $this->belongsTo(Project::class);
		}
	}
