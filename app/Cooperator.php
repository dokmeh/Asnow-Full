<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Rutorika\Sortable\SortableTrait;

	class Cooperator extends Model {
		use SortableTrait;

		protected $fillable = [
			'title',
			'title_fa',
			'url',
			'visible',
			'position',
			'category_id',
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
