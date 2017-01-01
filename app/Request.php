<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Request extends Model {
		protected $fillable = [
			'name',
			'request_type',
			'phone',
			'other_request',
		];

		public function files()
		{
			return $this->morphMany(File::class, 'fileable');
		}

		public function photos()
		{
			return $this->morphMany(Photo::class, 'photoable');
		}

	}
