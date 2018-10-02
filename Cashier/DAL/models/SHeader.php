<?php

namespace Thunderlabid\Cashier\DAL\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SHeader extends Model
{
	public $table = "s_header";

	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $fillable = ['nomor','deskripsi','jumlah'];

    public function line(){
    	return $this->hasMany('Thunderlabid\Cashier\DAL\Models\SLine','s_header_id');
    }

    public function bayar(){
    	return $this->hasMany('Thunderlabid\Cashier\DAL\Models\SBayar','s_header_id');
    }

    public function status(){
    	return $this->hasMany('Thunderlabid\Cashier\DAL\Models\SStatus','s_header_id');
    }
}