<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class File extends Model {
		protected $fillable = [
			'path',
			'publication_id',
		];

		public function publication()
		{
			$this->belongsTo(Publication::class);
		}
	}
