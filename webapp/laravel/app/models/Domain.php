<?php

class Domain extends Eloquent {
	protected $table = 'nf_domain';
	protected $primaryKey = 'did';
	public $timestamps = false;

	public function site() {
		return $this->hasMany('Site','nf_domain_did');
	}
}
