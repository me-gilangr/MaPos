<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satuan extends Model
{
	protected $table = 'T00_M_Satuan';
	protected $primaryKey = 'FK_SATUAN';
	protected $keyType = 'string';
	public $incrementing = false;

	protected $fillable = [
		'FK_SATUAN', 'FN_SATUAN'
	];

	use SoftDeletes;
}
