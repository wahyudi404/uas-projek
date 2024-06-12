<div class="container px-4">
    <div class="d-flex flex-wrap justify-content-between mb-2">
        <h3>Data Pengguna</h3>
        <button type="button" class="btn btn-success btn-add-surat" data-bs-toggle="modal" data-bs-target="#penggunaModal" data-baseurl="<?= BASE_URL ?>" data-page="<?= $data['page'] ?>">
            Tambah
        </button>
    </div>

    <?php Flasher::flash(); ?>

    <table class="table table-striped mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['pengguna'] as $key => $row) :
                $json_data = json_encode($row);
            ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-warning btn-edit-surat" data-bs-toggle="modal" data-bs-target="#penggunaModal" data-baseurl="<?= BASE_URL ?>" data-page="<?= $data['page'] ?>" data-json='<?= $json_data; ?>'>Edit</button>
                            <a href="<?= BASE_URL . $data['page'] ?>/destroy/<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus <?= $row['name'] ?>?')" class="btn btn-sm btn-danger btn-delete">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="penggunaModal" tabindex="-1" aria-labelledby="penggunaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="penggunaModalLabel">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL . $data['page'] ?>/store" method="post">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Nama:</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="col-form-label">Username:</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                        <small id="passwordHelpId" class="form-text text-muted d-none">Isi password jika ingin diubah!</small>
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