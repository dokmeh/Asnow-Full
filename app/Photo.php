<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Rutorika\Sortable\SortableTrait;


	class Photo extends Model {
		use SortableTrait;

		protected $fillable = ['image', 'name', 'position'];

		public function photoable()
		{
			return $this->morphTo();
		}
	}
