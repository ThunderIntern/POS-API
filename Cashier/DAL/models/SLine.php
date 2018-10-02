<?php

namespace Thunderlabid\Cashier\DAL\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SLine extends Model
{
	public $table = "s_line";

	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $fillable = ['ref_id','ref_tag','tag','kuantitas','harga_satuan','deskripsi','s_header_id'];

    
}