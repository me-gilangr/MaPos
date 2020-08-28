<div>
	<div class="row">
		<div class="col-12">
			<div class="card card-outline card-primary">
				<div class="card-header">
					<h4 class="card-title"> <i class="fa fa-cogs text-primary"></i> &ensp; Data Satuan</h4>
					<div class="card-tools">
						<div class="btn-group">
							<a href="#" class="btn btn-sm btn-danger" id="trashed">
								<i class="fa fa-trash"></i>
							</a>
							<a href="#" class="btn btn-sm btn-primary" id="tambah">
								<i class="fa fa-plus"></i> &ensp; Tambah Data Satuan
							</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive" wire:ignore>
						<table  class="table table-hover" id="satuan-table" style="width: 100%;" >
							<thead>
								<tr>
									<th width="10%">Kode</th>
									<th width="40%">Nama Satuan</th>
									<th width="20%">Tanggal Buat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody id="isi">

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalTrashed">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Data Satuan Terhapus</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive" wire:ignore>
					<table  class="table table-hover" id="satuan-trashed" style="width: 100%;" >
						<thead>
							<tr>
								<th width="10%">Kode</th>
								<th width="40%">Nama Satuan</th>
								<th width="20%">Tanggal Hapus</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody id="isi-trashed">

						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

@livewire('master.satuan.form')

@push('script')
<script>
	$(document).ready(function() {
		function getData(table,trashed = false) {
			if (trashed == 'true') {
				var column = [
					{ "data": 'FK_SATUAN', "name": 'FK_SATUAN', "orderable": true, "searchable": true, "className": "p17", },
					{ "data": 'FN_SATUAN', "name": 'FN_SATUAN', "orderable": true, "searchable": true, "className": "p17", },
					{ "data": 'deleted_at', "name": 'deleted_at', "orderable": true, "searchable": true, "className": "p17", },
					{ "data": "action", "name": "action", "searchable": false, "orderable": false, "className": "text-center" },
				]
			} else {
				var column = [
					{ "data": 'FK_SATUAN', "name": 'FK_SATUAN', "orderable": true, "searchable": true, "className": "p17", },
					{ "data": 'FN_SATUAN', "name": 'FN_SATUAN', "orderable": true, "searchable": true, "className": "p17", },
					{ "data": 'created_at', "name": 'created_at', "orderable": true, "searchable": true, "className": "p17", },
					{ "data": "action", "name": "action", "searchable": false, "orderable": false, "className": "text-center" },
				]
			}

			$(table).DataTable().clear();
			$(table).DataTable().destroy();
			$(table).DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					"url": "{{ route('datatable.satuan') }}",
					"dataType": "json",
					"type": "POST",
					"data": {
						_token: "{{ csrf_token() }}",
						trashed:trashed,
					},
				},
				columns: column,
			});
		}

		getData('#satuan-table');

		$('#tambah').on('click', function(e) {
			e.preventDefault();
			$('#modalCreate').modal('show');
		});

		$('#modalCreate').on('shown.bs.modal', function() {
			$(this).find('[autofocus]').focus();
		});

		$("#isi").on('click', '.edit', function(){
			var kode = $(this).data('id');
			window.livewire.emit('edit', kode);
		});

		$("#isi").on('click', '.hapus', function(){
			var kode = $(this).data('id');
			window.livewire.emit('hapus', kode);
		})

		$("#isi-trashed").on('click', '.restore', function(){
			var kode = $(this).data('id');
			window.livewire.emit('restore', kode);
		})

		window.livewire.on('updatedDataTable', function(){
			$('#modalTrashed').modal('hide');
			getData('#satuan-table');
			getData('#satuan-trashed', true);
		});

		$('#trashed').on('click', function() {
			$('#modalTrashed').modal('show');
			getData('#satuan-trashed', true);
		});
	});

</script>
@endpush