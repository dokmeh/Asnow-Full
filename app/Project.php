<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Project extends Model {
		use \Rutorika\Sortable\SortableTrait;

		protected static $sortableField = 'sort';

		protected $fillable = [
			'title',
			'location',
			'client',
			'description',
			'design_at',
			'completed_at',
			'site_area',
			'floor_area',
			'sort',
			'category_id',
			'status_id',
		];

		public function photos()
		{
			return $this->morphMany(Photo::class, 'photoable');
		}

		public function thumbnails()
		{
			return $this->morphMany(Thumbnail::class, 'thumbnailable');
		}

		public function category()
		{
			return $this->belongsTo(Category::class);
		}

		public function status()
		{
			return $this->belongsTo(Status::class);
		}

		public function awards()
		{
			return $this->hasMany(Award::class);
		}

		public function publications()
		{
			return $this->hasMany(Publication::class);
		}

	}
