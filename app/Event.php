<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Event extends Model {
		protected $fillable = [
			'name',
			'name_fa',
			'date',
			'description',
			'description_fa',
		];

		public function thumbnail()
		{
			return $this->morphOne(Thumbnail::class, 'thumbnailable');
		}

		public function photos()
		{
			return $this->morphMany(Photo::class, 'photoable');
		}
	}
