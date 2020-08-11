
<div class="sidebar">
	<nav class="mt-3">
		<ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-item active">
				<a href="{{ route('main') }}" class="nav-link">
					<i class="nav-icon fa fa-home"></i>
					<p>
						Halaman Utama
						{{-- <span class="badge badge-info right">2</span> --}}
					</p>
				</a>
			</li>
			<li class="nav-header pt-3 pl-2">Master Data</li>
			<li class="nav-item">
				<a href="{{ route('main') }}" class="nav-link">
					<i class="nav-icon fa fa-cogs text-primary"></i>
					<p>
						Data Satuan
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('main') }}" class="nav-link">
					<i class="nav-icon fa fa-cogs text-primary"></i>
					<p>
						Data Jenis
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('main') }}" class="nav-link">
					<i class="nav-icon fa fa-cubes text-success"></i>
					<p>
						Data Barang
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('main') }}" class="nav-link">
					<i class="nav-icon fa fa-users text-purple"></i>
					<p>
						Data Supplier
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('main') }}" class="nav-link">
					<i class="nav-icon fa fa-users text-purple"></i>
					<p>
						Data Customer
					</p>
				</a>
			</li>
			<li class="nav-header pt-3 pl-2">Relasi</li>
			<li class="nav-item">
				<a href="{{ route('main') }}" class="nav-link">
					<i class="nav-icon fa fa-link text-danger"></i>
					<p>
						Relasi Barang Supplier
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('main') }}" class="nav-link">
					<i class="nav-icon fa fa-link text-danger"></i>
					<p>
						Relasi Barang Customer
					</p>
				</a>
			</li>
			<li class="nav-header pt-3 pl-2">Pembelian</li>
			<li class="nav-item">
				<a href="{{ route('main') }}" class="nav-link">
					<i class="nav-icon fa fa-truck text-primary"></i>
					<p>
						Pre-Order
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('main') }}" class="nav-link">
					<i class="nav-icon fa fa-box-open text-success"></i>
					<p>
						Penerimaan
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('main') }}" class="nav-link">
					<i class="nav-icon fa fa-money-check-alt text-navy"></i>
					<p>
						Pembayaran
					</p>
				</a>
			</li>
		</ul>
	</nav>
</div>