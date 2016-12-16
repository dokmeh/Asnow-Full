<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Photo extends Model {
		protected $fillable = ['image', 'name'];

		public function photoable()
		{
			return $this->morphTo();
		}
	}
