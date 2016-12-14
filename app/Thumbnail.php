<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Thumbnail extends Model {
		protected $fillable = ['thumbnail_path'];

		public function thumbnailable()
		{
			return $this->morphTo();
		}
	}
