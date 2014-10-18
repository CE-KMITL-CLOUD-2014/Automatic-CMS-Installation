<?php
class Users extends Eloquent  {
    public $timestamps = false;
    protected $table = 'nf_user';
    protected $primaryKey = 'uid';
}