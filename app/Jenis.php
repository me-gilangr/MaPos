<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenis extends Model
{
	protected $table = 'T00_M_Jenis';	
	protected $primaryKey	= 'FK_JENIS';
	public $incrementing = false;

	protected $fillable = [
		'FK_JENIS', 'FN_JENIS'
	];

	use SoftDeletes;
}
