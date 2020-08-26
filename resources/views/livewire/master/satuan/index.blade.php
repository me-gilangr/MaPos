<div>
	<div class="row">
		<div class="col-12">
			<div class="card card-outline card-primary">
				<div class="card-header">
					<h4 class="card-title"> <i class="fa fa-cogs text-primary"></i> &ensp; Data Satuan</h4>
					<div class="card-tools">
						<div class="btn-group">
							<a href="#" class="btn btn-sm btn-danger">
								<i class="fa fa-trash"></i>
							</a>
							<a href="#" class="btn btn-sm btn-primary" id="tambah">
								<i class="fa fa-plus"></i> &ensp; Tambah Data Satuan
							</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover" id="satuan-table" style="width: 100%;">
							<thead>
								<tr>
									<th>#</th>
									<th>Kode Satuan</th>
									<th>Nama Satuan</th>
									<th>Date</th>
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
@livewire('master.satuan.form')

@push('script')
<script>
	$(document).ready(function() {


		
		$('#tambah').on('click', function(e) {
			e.preventDefault();
			$('#modalCreate').modal('show');
		});

		$('#modalCreate').on('shown.bs.modal', function() {
			$(this).find('[autofocus]').focus();
		});

		function getData() {
			$('#satuan-table').DataTable().clear();
				$('#satuan-table').DataTable().destroy();
				$('#satuan-table').DataTable({
					processing: true,
					serverSide: true,
					ajax: {
						"url": "{{ route('datatable.satuan') }}",
						"dataType": "json",
						"type": "POST",
						"data": {
							_token: "{{ csrf_token() }}",
						},
					},
					columns: [
						{
							"data": 'DT_RowIndex',
							"name": 'DT_RowIndex',
							"orderable": false,
							"searchable": false
						},
						{
							"data": 'FK_SATUAN',
							"name": 'FK_SATUAN',
							"orderable": true,
							"searchable": true
						},
						{
							"data": 'FN_SATUAN',
							"name": 'FN_SATUAN',
							"orderable": true,
							"searchable": true
						},
						{
							"data": 'created_at',
							"name": 'created_at',
							"orderable": true,
							"searchable": true
						},
						{
							"data": "action",
							"name": "action",
							"searchable": false,
							"orderable": false,
							"className": "text-center"
						},
					],
				});
		}

		getData();

		$("#isi").on('click', '.edit', function(){
			var kode = $(this).data('id');
			alert(kode);
		})


		window.livewire.on('updatedDataTable', function(){
			getData();
		});
	});

</script>
@endpush