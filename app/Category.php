<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $table = 'category';
	public function TinTuc() {
		return $this->hasmany('App\News', 'id_cat', 'id');
	}
	public $timestamps = false;
}
