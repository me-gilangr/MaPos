<?php

namespace App\Http\Livewire\Master\Satuan;

use App\Satuan;
use Livewire\Component;

class Index extends Component
{
	protected $listeners = [
		'hapus' => 'deleting',
		'restore' => 'restoring',
	];

	public function render()
	{
		return view('livewire.master.satuan.index');
	}

	public function deleting($kode)
	{
		try {
			$satuan = Satuan::findOrFail($kode);
			$satuan->delete();

			$this->emit('updatedDataTable');
			$this->emit('warning', 'Data di-Hapus !');
		} catch (\Exception $e) {
			$this->emit('error', 'Terjadi Kesalahan !');
		}
	}

	public function restoring($kode)
	{
		try {
			$satuan = Satuan::onlyTrashed()->findOrFail($kode);
			$satuan->restore();

			$this->emit('updatedDataTable');
			$this->emit('success', 'Data di-Pulihkan !');
		} catch (\Exception $e) {
			dd($e);
			$this->emit('error', 'Terjadi Kesalahan !');
		}
	}
}
