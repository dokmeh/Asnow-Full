<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Cooperator extends Model {
		protected $fillable = [
			'title',
			'title_fa',
			'url',
			'visible',
			'position',
		];

		public function category()
		{
			return $this->belongsTo(Category::class);
		}

		public function photos()
		{
			return $this->morphMany(Photo::class, 'photoable');
		}

		public function thumbnails()
		{
			return $this->morphMany(Thumbnail::class, 'thumbnailable');
		}
	}
