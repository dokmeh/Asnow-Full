<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Publication extends Model {
		protected $fillable = [
			'name',
			'description',
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
