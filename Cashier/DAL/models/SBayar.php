<?php

namespace Thunderlabid\Cashier\DAL\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SBayar extends Model
{
	public $table = "s_bayar";

	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $fillable = ['ref_id','ref_tag','deskripsi','jumlah','s_header_id'];

    
}