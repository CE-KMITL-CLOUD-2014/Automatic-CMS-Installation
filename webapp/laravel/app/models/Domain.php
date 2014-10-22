<?php

class Domain extends Eloquent {
	protected $table = 'nf_domain';
	protected $primaryKey = 'did';
	public $timestamps = false;
}
