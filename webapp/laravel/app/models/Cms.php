<?php

class Cms extends Eloquent {
	protected $table = 'nf_cms';
	protected $primaryKey = 'cid';
	public $timestamps = false;

	public function site() {
		return $this->hasMany('Site','nf_cms_cid');
	}
}
