<?php

class Site extends Eloquent {
	protected $table = 'nf_site';
	protected $primaryKey = 'sid';
	public $timestamps = false;

	public function user() {
		return $this->belongsTo('User','nf_user_uid');
	}

	public function domain() {
		return $this->belongsTo('Domain','nf_domain_did');
	}

	public function cms() {
		return $this->belongsTo('Cms','nf_cms_cid');
	}
}
