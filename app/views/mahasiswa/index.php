<div class="container mt-3">

	<div class="row">
		<div class="col-6">
			<?php Flasher::flash() ?>
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#formModal">
				Tambah Data Mahasiswa
			</button>

			<h3>Daftar Mahasiswa</h3>
			<ul class="list-group">
				<?php foreach($data['mhs'] as $mhs): ?>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<?= $mhs['name'] ?>
						<a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge text-bg-primary">Detail</a>
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
				<h1 class="modal-title fs-5" id="judulModal">Tambah Data Mahasiswa</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<form action="<?= BASEURL ?>/mahasiswa/tambah" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Nama</label>
						<input type="text" class="form-control" id="name" name="name" />
					</div>
					<div class="form-group">
						<label for="nim">NIM</label>
						<input type="text" class="form-control" id="nim" name="nim" />
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" />
					</div>
					<div class="form-group">
						<label for="study">Jurusan</label>
						<select class="form-control" id="study" name="study">
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