<?php

namespace App\Http\Livewire\Master\Satuan;

use App\Http\Config\RandomId;
use App\Satuan;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Form extends Component
{
	use RandomId;

	public $FN_SATUAN = '';

	public function hydrate()
	{
			$this->resetErrorBag();
			$this->resetValidation();
	}

	public function render()
	{
		return view('livewire.master.satuan.form');
	}
	
	public function updated($name, $value)
	{
		$this->validating();
	}

	public function tambah()
	{
		$data = $this->validating();

		$kode = $this->generateId('App\Satuan', 'S', 1, 2);
		$simpan = Satuan::firstOrCreate([
			'FK_SATUAN' => $kode,
			'FN_SATUAN' => $this->FN_SATUAN
		]);

		$this->clear();
		$this->emit('tutupModal');
		$this->emit('updatedDataTable');
		
	}

	public function clear()
	{
		$this->FN_SATUAN = '';
	}
	
	public function validating()
	{
		$data = Validator::make(
			['FN_SATUAN' => $this->FN_SATUAN],
			['FN_SATUAN' => 'required|string|max:10'],
			[
				'string' => 'Isi Harus Berupa Karakter !',
				'required' => 'Field Wajib di-Isi / Tidak Boleh Kosong !',
				'max' => 'Jumlah Huruf Tidak Boleh Lebih Dari 10 Karakter'
			]
		)->validate();

		return $data;
	}
}
