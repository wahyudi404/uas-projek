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
                                <h5 class="card-title" data-bs-toggle="tooltip" title="<?= $row['perihal'] ?>">
                                    <a href="<?= BASE_URL . $data['page'] ?>/detail/<?= $row['id'] ?>" class="text-decoration-none"><?= $row['perihal'] ?></a>
                                </h5>
                                <p class="card-text text-muted" style="font-size: small;">
                                <span>
                                    Dari: <b><?= $row['nama_mhs'] ?> - <?= $row['program_studi'] ?></b>
                                </span>
                                <br>
                                <span>
                                Untuk: <b><?= $row['penerima'] ?></b>
                                </span>
                            </p>
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
                            <label for="perihal" class="col-form-label">Perihal:</label>
                            <input type="text" name="perihal" class="form-control" id="perihal" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="penerima" class="col-form-label">Tujuan/Penerima Surat:</label>
                            <input type="text" name="penerima" class="form-control" id="penerima" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="kota_tujuan" class="col-form-label">Kota Tujuan:</label>
                            <input type="text" name="kota_tujuan" class="form-control" id="kota_tujuan" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="mengadakan_untuk" class="col-form-label">Mengadakan Untuk?:</label>
                            <input type="text" name="mengadakan_untuk" class="form-control" id="mengadakan_untuk" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="matkul" class="col-form-label">Mata Kuliah:</label>
                            <input type="text" name="matkul" class="form-control" id="matkul" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="dosen_pembimbing" class="col-form-label">Dosen Pembimbing:</label>
                            <input type="text" name="dosen_pembimbing" class="form-control" id="dosen_pembimbing" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="tujuan_instansi" class="col-form-label" style="font-size: small;">Tujuan Perusahaan/Badan Yang Melakukan Kegiatan Kepada Masyarakat:</label>
                            <input type="text" name="tujuan_instansi" class="form-control" id="tujuan_instansi" placeholder="Contoh: Dinas/Instansi" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nama_mhs" class="col-form-label">Nama Mahasiswa:</label>
                            <input type="text" name="nama_mhs" class="form-control" id="nama_mhs" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nim" class="col-form-label">NIM:</label>
                            <input type="number" name="nim" class="form-control" id="nim" required>
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