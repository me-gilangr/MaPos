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
	public $edit = false;

	protected $listeners = [
		'edit' => 'editing',
		'editFalse' => 'editFalse',
	];

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
		$this->emit('success', 'Berhasil Menambahkan Data !');
	}

	public function clear()
	{
		$this->edit = false;
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

	public function editing($id)
	{
		try {
			$this->edit = false;
			$satuan = Satuan::findOrFail($id);
			$this->edit = $satuan;
			$this->emit('bukaModal');
			$this->FN_SATUAN = $satuan->FN_SATUAN;
		} catch (\Exception $e) {
			$edit = false;
			$this->emit('error', 'Terjadi Kesalahan !');
		}
	}

	public function updateData($kode)
	{
		try {
			$satuan = Satuan::findOrFail($kode);
			$satuan->update([
				'FN_SATUAN' => $this->FN_SATUAN
			]);

			$this->clear();
			$this->emit('tutupModal');
			$this->emit('updatedDataTable');
			$this->emit('info', 'Data di-Ubah !');
		} catch (\Exception $e) {
			$this->emit('error', 'Terjadi Kesalahan !');
		}
	}

	public function editFalse()
	{
		$this->clear();
	}
}
