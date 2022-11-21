<div class="container mt-3">

	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash() ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<button type="button" class="btn btn-primary mb-2 addData" data-bs-toggle="modal" data-bs-target="#formModal">
				Tambah Data Mahasiswa
			</button>
		</div>
	</div>

	<div class="row my-2">
		<div class="col-lg-6">
			<form action="<?= BASEURL ?>/mahasiswa/search" method="post">
				<div class="input-group">
					<input type="text" class="form-control" name="keyword" id="keyword" placeholder="Cari mahasiswa..." autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit">Cari</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">

			<h3>Daftar Mahasiswa</h3>
			<ul class="list-group">
				<?php foreach($data['mhs'] as $mhs): ?>
					<li class="list-group-item fs-5">
						<?= $mhs['name'] ?>
						<a href="<?= BASEURL ?>/mahasiswa/delete/<?= $mhs['id'] ?>" class="badge fs-6 text-bg-danger text-decoration-none float-end" onclick="return confirm('Yakin?')">Hapus</a>
						<a href="<?= BASEURL ?>/mahasiswa/edit/<?= $mhs['id'] ?>" class="badge fs-6 text-bg-success text-decoration-none float-end mx-2 editModal" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id'] ?>">Edit</a>
						<a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge fs-6 text-bg-primary text-decoration-none float-end">Detail</a>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h1 class="modal-title fs-5" id="formModalLabel">Tambah Data Mahasiswa</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<form action="<?= BASEURL ?>/mahasiswa/add" method="post">
				<div class="modal-body">
					<input type="hidden" id="formId" name="id" />
					<div class="form-group">
						<label for="formName">Nama</label>
						<input type="text" class="form-control" id="formName" name="name" />
					</div>
					<div class="form-group">
						<label for="formNim">NIM</label>
						<input type="text" class="form-control" id="formNim" name="nim" />
					</div>
					<div class="form-group">
						<label for="formEmail">Email</label>
						<input type="email" class="form-control" id="formEmail" name="email" />
					</div>
					<div class="form-group">
						<label for="formStudy">Jurusan</label>
						<select class="form-control" id="formStudy" name="study">
							<option value="Ilmu Kelautan">Ilmu Kelautan</option>
							<option value="Psikologi">Psikologi</option>
							<option value="Teknik Informatika">Teknik Informatika</option>
							<option value="Teknik Industri">Teknik Industri</option>
							<option value="Teknik Pangan">Teknik Pangan</option>
							<option value="Teknik Planologi">Teknik Planologi</option>
							<option value="Teknik Lingkungan">Teknik Lingkungan</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Tambah Data</button>
				</div>
			</form>

		</div>
	</div>
</div>
