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
                                <h5 class="card-title" data-bs-toggle="tooltip" title="<?= $row['judul'] ?>">
                                    <a href="<?= BASE_URL . $data['page'] ?>/detail/<?= $row['id'] ?>" class="text-decoration-none"><?= $row['judul'] ?></a>
                                </h5>
                                <h6 class="card-subtitle text-muted"><?= $row['nama'] . ' - '  . $row['tahun'] ?></h6>
                                <p class="card-text text-muted" style="font-size: small;"><?= $row['program_studi'] ?></p>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-sm btn-warning btn-edit-surat" data-bs-toggle="modal" data-bs-target="#suratModal" data-baseurl="<?= BASE_URL ?>" data-page="<?= $data['page'] ?>" data-json='<?= $json_data; ?>'>Edit</button>
                                <a onclick="return confirm('Yakin ingin menghapus: <?= $row['judul'] ?>?')" href="<?= BASE_URL . $data['page'] ?>/destroy/<?= $row['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        else : ?>
            <h2 class="fs-2 text-center text-muted">Data Tidak Ditemukan</h2>
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
                <h5 class="modal-title" id="suratModalLabel">Tambah Surat Ijin Penelitian</h5>
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
                            <label for="nama" class="col-form-label">Nama:</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nim" class="col-form-label">NIM:</label>
                            <input type="number" name="nim" class="form-control" id="nim" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6 d-flex gap-2">
                            <div>
                                <label for="tempat_lahir" class="col-form-label">Tempat Lahir:</label>
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
                            </div>
                            <div>
                                <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir:</label>
                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="tempat_penelitian" class="col-form-label">Kota/Kabupaten Tempat Penelitian:</label>
                            <input type="text" name="tempat_penelitian" class="form-control" id="tempat_penelitian" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="tahun" class="col-form-label">Tahun Sekarang:</label>
                            <input type="number" name="tahun" class="form-control" id="tahun" required>
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
                            <label for="yth_kpd" class="col-form-label">Yang Terhormat Kepada:</label>
                            <textarea name="yth_kpd" class="form-control" id="yth_kpd" required cols="15" rows="5"></textarea>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="judul" class="col-form-label">Judul Penelitian:</label>
                            <textarea name="judul" class="form-control" id="judul" required cols="15" rows="5"></textarea>
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