<div>
	<form wire:submit.prevent="tambah()">
		<div wire:ignore.self class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalCreateLabel">Form Tambah Satuan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="">Nama Satuan : <span class="text-danger">*</span></label>
									<input type="text" wire:model.lazy="FN_SATUAN" name="FN_SATUAN" id="FN_SATUAN" class="form-control {{ $errors->has('FN_SATUAN') ? 'is-invalid':'' }}" placeholder="Masukan Nama Satuan..." autofocus required>
									<span class="text-danger">
										{{ $errors->first('FN_SATUAN') }}
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Tambah Data</button>
					</div>
				</div>
			</div>
		</div>
	</form>

</div>

	@push('script')
		<script>
			$(document).ready(function(){
				window.livewire.on('tutupModal', function(){
					$('#modalCreate').modal('hide');
				});
			});
		</script>
	@endpush