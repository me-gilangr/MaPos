<?php

namespace App\Http\Controllers;

use App\Http\Config\JsonDatatable;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
		use JsonDatatable;

    public function index()
    {
      return view('satuan.index', compact('title'));
		}
		
		public function datatable(Request $request)
		{
			return $this->jsonGetData('App\Satuan');
		}

		public function _dataColumn($dataTables)
		{
			$dataTables->addColumn('created_at', function ($data) {
				$date = '<h1>'. date('d/m/Y',strtotime($data->created_at)).'</h1>';
				return $date;
			});
			
			$this->rawColumns(['created_at']);

			return $dataTables;
		}
}
