<div class="container px-4">
    <div class="d-flex flex-wrap justify-content-between mb-2">
        <h3>Data Fakultas</h3>
        <button type="button" class="btn btn-success btn-add-fakultas" data-bs-toggle="modal" data-bs-target="#fakultasModal" data-baseurl="<?= BASE_URL ?>">
            Tambah
        </button>
    </div>

    <?php Flasher::flash(); ?>

    <table class="table table-striped mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama fakultas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['fakultas'] as $key => $row) : ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $row['nama_fakultas'] ?></td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-warning btn-edit-fakultas" data-bs-toggle="modal" data-bs-target="#fakultasModal" data-id="<?= $row['id'] ?>" data-namafakultas="<?= $row['nama_fakultas'] ?>" data-baseurl="<?= BASE_URL ?>">Edit</button>
                            <a href="<?= BASE_URL ?>fakultas/destroy/<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus fakultas <?= $row['nama_fakultas'] ?>?')" class="btn btn-sm btn-danger btn-delete">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="fakultasModal" tabindex="-1" aria-labelledby="fakultasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fakultasModalLabel">Tambah Fakultas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASE_URL ?>fakultas/store" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_fakultas" class="col-form-label">Nama fakultas:</label>
                        <input type="text" name="nama_fakultas" class="form-control" id="nama_fakultas" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>