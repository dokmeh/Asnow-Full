<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Event extends Model {
		protected $fillable = [
			'name',
			'date',
			'description',
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
