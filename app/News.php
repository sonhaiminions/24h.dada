<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {
	protected $table = "news";
	public $timestamps = false;
	public function Category() {
		return $this->belongsto('App\Category', 'id_cat', 'id');
	}
}
