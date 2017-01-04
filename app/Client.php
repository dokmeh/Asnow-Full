<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Client extends Model {

		public function project()
		{
			return $this->hasMany(Project::class);
		}

		public function thumbnail()
		{
			return $this->morphOne(Thumbnail::class, 'thumbnailable');
		}
	}
