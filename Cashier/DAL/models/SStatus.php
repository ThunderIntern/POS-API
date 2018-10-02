<?php

namespace Thunderlabid\Cashier\DAL\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SStatus extends Model
{
	public $table = "s_status";

	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $fillable = ['tanggal','status','progress','s_header_id'];

}