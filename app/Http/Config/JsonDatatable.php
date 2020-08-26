<?php 

namespace App\Http\Config;

use App\Satuan;
use DataTables;

trait JsonDatatable
{
	public $pk;
	public $rawCols = ['action'];
	public function jsonGetData($model)
	{
		$model = new $model;
		$this->pk = $model->getKeyName();
		$a = $model->newQuery();
		$dataTables =  DataTables::eloquent($a);
		$dataTables->addColumn('action', function ($data) {
				$btn = '
					<div class="btn-group">
						<a href="#" class="btn btn-sm btn-info edit" data-toggle="tooltip" data-placement="top" title="Edit Data" data-original-title="Edit Data" data-id="'.$data[$this->pk].'">
								<i class="fa fa-edit"></i>
						</a>
						<button type="submit" class="btn btn-sm btn-danger hapus" data-id="'.$data[$this->pk].'" style="border-radius: 0px;">
							<i class="fa fa-trash"></i>
						</button>
					</div>
					';
				return $btn;
			});

		
			if(method_exists($this, '_dataColumn')){
				$dataTables = $this->_dataColumn($dataTables);
			}
			$dataTables->rawColumns($this->rawCols);
		return $dataTables->addIndexColumn()->toJson();
	}

	public function rawColumns($rawCols)
	{
		foreach ($rawCols as $key => $value) {
			array_push($this->rawCols, $value);
		}
	}
}
