<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Mahasiwa</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Data Mahasiwa</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->

		<section class="content">
			<?= $this->session->flashdata('message');?>
			
			<div class="row">
				<div class="col-sm-6">
					<button class="btn btn-primary inline" data-toggle="modal" data-target="#staticBackdrop"><i
							class="fa fa-plus"></i>
						Tambah data mahasiswa
					</button>

					<a href="<?= base_url('mahasiswa/print') ?>" class="btn btn-danger inline"><i class="fa fa-print">
							print</i></a>

					<div class="dropdown" style="display: inline;">
						<button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
								class="fa fa-download"></i>
							Export
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="<?= base_url('mahasiswa/pdf') ?>">PDF</a>
							<a class="dropdown-item" href="<?= base_url('mahasiswa/excel') ?>">EXCEL</a>

						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="navbar-form navbar-right" style="float: right;">
						<?= form_open('mahasiswa/search') ?>
						<input type="text" name="keyword" class="form-control" placeholder="Search"
							style="width: 250px; display: inline;">
						<button type="submit" class="btn btn-success" style="display: inline;">
							cari
						</button>
						<?= form_close() ?>
					</div>
				</div>
			</div>





			<table class="table">
				<tr>
					<th>No</th>
					<th>Nama Mahasiswa</th>
					<th>NIM</th>
					<th>Tanggal Lahir</th>
					<th>Jurusah</th>
					<th colspan="2">Aksi</th>
				</tr>

				<?php $no = 1; foreach($mahasiswa as $mhs) : ?>
				<tr>
					
					<td><?= $no++ ?></td>
					<td><?= $mhs->nama ?></td>
					<td><?= $mhs->nim ?></td>
					<td><?= $mhs->tgl_lahir ?></td>
					<td><?=  $mhs->jurusan ?></td>
					<td><?= anchor('mahasiswa/detail/'.$mhs->id, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>')?>
					</td>
					<td onclick="javascript: return confirm('andan yakin hapus')">
						<?= anchor('mahasiswa/hapus/'.$mhs->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>'); ?>
					</td>
					<td><?= anchor('mahasiswa/edit/'.$mhs->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</section>

		<!-- Button trigger modal -->
		<script src="http://maps.googleapis.com/maps/api/js"></script>
    <p>wiwieajsdjkl</p>
    <!-- Elemen yang akan menjadi kontainer peta -->
    <div id="googleMap" style="width:100%;height:380px;"></div>


    

<script>
    // fungsi initialize untuk mempersiapkan peta
    function initialize() {
        var propertiPeta = {
            center: new google.maps.LatLng(-8.5830695, 116.3202515),
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    }

    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
			aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Form Tambah Mahasiswa</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?= form_open_multipart('mahasiswa/tambah_aksi'); ?>
							<div class="form-groub">
								<label for="">Nama Mahasiswa</label>
								<input type="text" name="nama" class="form-control">
							</div>
							<div class="form-groub">
								<label for="">NIM</label>
								<input type="text" name="nim" class="form-control">
							</div>
							<div class="form-groub">
								<label for="">Tanggal Lahir</label>
								<input type="date" name="tgl_lahir" class="form-control">
							</div>
							<div class="form-groub">
								<label for="">Jurusan</label>
								<select class="form-control" name="jurusan">
									<option value="Sistem Informatika">Sistem Informatika</option>
									<option value="Teknik Informatika">Teknik Informatika</option>
								</select>
							</div>
							<div class="form-groub">
								<label for="">alamat</label>
								<input type="text" name="alamat" class="form-control">
							</div>
							<div class="form-groub">
								<label for="">email</label>
								<input type="text" name="email" class="form-control">
							</div>
							<div class="form-groub">
								<label for="">no_telp</label>
								<input type="text" name="no_telp" class="form-control">
							</div>
							<div class="form-groub">
								<label for="">Upload Foto</label>
								<input type="file" name="foto" class="form-control">
							</div>

					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>

					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>
