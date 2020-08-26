<?php 

namespace App\Http\Config;

trait RandomId
{
	public function generateId($model, $awalan = '', $potong_depan, $ambil_belakang)
	{
		$model = new $model;
		$primaryKey = $model->getKeyName();
		$no = $model->withTrashed()->where($primaryKey, 'like', $awalan.'%')->get();
    if (count($no) > 0) {
			$array = count($no) - 1;
			$data = $no[$array]->$primaryKey;
			$hapus = (int) substr($data,$potong_depan,$ambil_belakang);
			$hapus++;
			$kodeSatuan = $awalan . sprintf("%0".$ambil_belakang."s", $hapus);
    }else{
			$kodeSatuan = $awalan . sprintf("%0".$ambil_belakang."s", 1);
		}
		
		return $kodeSatuan;
	}
}
