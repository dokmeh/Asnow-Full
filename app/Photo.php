<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Rutorika\Sortable\SortableTrait;


	class Photo extends Model {
		use SortableTrait;

		protected static $sortableField = 'sort';
		protected        $fillable      = ['image', 'name', 'sort'];

		public function photoable()
		{
			return $this->morphTo();
		}
	}
