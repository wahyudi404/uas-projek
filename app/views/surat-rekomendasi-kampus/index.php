<div class="container px-4">
    <div class="row mb-4">

        <div class="col-12 mb-4">
            <h1 class="fs-3"><?= $data['title'] ?></h1>
        </div>

        <div class="col-12 col-md-8 mb-2 d-flex align-items-center gap-2">
            <div class="form-group d-flex align-items-center gap-1">
                <label for="show">Show</label>
                <select id="show" class="form-select">
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="0">All</option>
                </select>
            </div>
            <form action="<?= BASE_URL . $data['page'] ?>" method="post">
                <div class="input-group">
                    <input type="search" name="key" class="form-control" placeholder="Pencarian...">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>
        </div>

        <div class="col-12 col-md-4 mb-2 d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-success btn-sm btn-add-surat" data-bs-toggle="modal" data-bs-target="#suratModal" data-baseurl="<?= BASE_URL ?>" data-page="<?= $data['page'] ?>">
                Tambah
            </button>
        </div>

        <div class="col-12 d-flex flex-column">
            <div style="font-weight: 600;"><?= !empty($_POST) && isset($_POST['key']) && $_POST['key'] !== ""  ? 'Hasil Pencarian berdasarkan keyword : "' . $_POST['key'] . '"' : '' ?></div>
        </div>
    </div>

    <?php Flasher::flash(); ?>

    <div id="pagination-list" class="row mt-4">

        <?php
        if (!empty($data['surat'])) :
            foreach ($data['surat'] as $row) :
                $json_data = json_encode($row);
        ?>

                <div class="col-sm-12 col-md-6 col-lg-4 mb-4 item-list">
                    <div class="card text-decoration-none" style="height: 100%;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="mb-4">
                                <h5 class="card-title">
                                    <a href="<?= BASE_URL . $data['page'] ?>/detail/<?= $row['id'] ?>" class="text-decoration-none"><?= $row['nim'] ?> - <?= $row['nama_mhs'] ?></a>
                                </h5>
                                <h6 class="card-subtitle text-muted"><?= $row['nama_perekomendasi'] ?> - <?= $row['jabatan'] ?></h6>
                                <p class="card-text text-muted" style="font-size: small;"><?= $row['program_studi'] ?> - <?= $row['tahun_akademik'] ?></p>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-sm btn-warning btn-edit-surat" data-bs-toggle="modal" data-bs-target="#suratModal" data-baseurl="<?= BASE_URL ?>" data-page="<?= $data['page'] ?>" data-json='<?= $json_data; ?>'>Edit</button>
                                <a onclick="return confirm('Yakin ingin menghapus: <?= $row['nama_mhs'] ?>?')" href="<?= BASE_URL . $data['page'] ?>/destroy/<?= $row['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        else :
            ?>
            <h2 id="list-null" class="fs-2 text-center text-muted">Data Tidak Ditemukan</h2>
        <?php endif; ?>
        <nav aria-label="Page navigation example">
            <ul id="pagination-numbers" class="pagination justify-content-center"></ul>
        </nav>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="suratModal" tabindex="-1" aria-labelledby="suratModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="suratModalLabel">Tambah Surat Rekomendasi Kampus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL . $data['page'] ?>/store" method="post">
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="tahun_sekarang" class="col-form-label">Tahun Sekarang:</label>
                            <input type="number" name="tahun_sekarang" class="form-control" id="tahun_sekarang" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nama_perekomendasi" class="col-form-label">Nama Yang Merekomendasikan:</label>
                            <input type="text" name="nama_perekomendasi" class="form-control" id="nama_perekomendasi" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="jabatan" class="col-form-label">Jabatan:</label>
                            <input type="text" name="jabatan" class="form-control" id="jabatan" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nidn" class="col-form-label">NIDN:</label>
                            <input type="text" name="nidn" class="form-control" id="nidn" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nama_mhs" class="col-form-label">Nama Mahasiswa:</label>
                            <input type="text" name="nama_mhs" class="form-control" id="nama_mhs" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nim" class="col-form-label">NIM:</label>
                            <input type="text" name="nim" class="form-control" id="nim" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="fakultas_id" class="col-form-label">Fakultas:</label>
                            <select name="fakultas_id" class="form-control" id="fakultas_id" data-baseurl="<?= BASE_URL ?>" data-page="<?= $data['page'] ?>" required>
                                <option value="" selected disabled>--Pilih Fakultas--</option>
                                <?php foreach ($data['fakultas'] as $row) : ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['nama_fakultas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="program_studi_id" class="col-form-label">Program Studi:</label>
                            <select name="program_studi_id" class="form-control" id="program_studi_id" disabled required></select>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="semester" class="col-form-label">Semester:</label>
                            <input type="number" name="semester" class="form-control" id="semester" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="ipk" class="col-form-label">IPK:</label>
                            <input type="number" step="0.01" name="ipk" class="form-control" id="ipk" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="untuk_menjadi" class="col-form-label">Untuk Menjadi?:</label>
                            <input type="text" name="untuk_menjadi" class="form-control" id="untuk_menjadi" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="tahun_akademik" class="col-form-label">Tahun Akademik:</label>
                            <input type="number" name="tahun_akademik" class="form-control" id="tahun_akademik" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>