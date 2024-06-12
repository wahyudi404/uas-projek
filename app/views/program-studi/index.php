<div class="container px-4">
    <div class="d-flex flex-wrap justify-content-between mb-2">
        <h3>Data Program Studi</h3>
        <button type="button" class="btn btn-success btn-add-program-studi" data-bs-toggle="modal" data-bs-target="#programStudiModal" data-baseurl="<?= BASE_URL ?>">
            Tambah
        </button>
    </div>

    <?php Flasher::flash(); ?>

    <table class="table table-striped mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['program_studi'] as $key => $row) : ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $row['program_studi'] ?></td>
                    <td><?= $row['nama_fakultas'] ?></td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-warning btn-edit-program-studi" data-bs-toggle="modal" data-bs-target="#programStudiModal" data-id="<?= $row['id'] ?>" data-programstudi="<?= $row['program_studi'] ?>" data-fakultasid="<?= $row['fakultas_id'] ?>" data-baseurl="<?= BASE_URL ?>">Edit</button>
                            <a href="<?= BASE_URL ?>program-studi/destroy/<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus program studi <?= $row['program_studi'] ?>?')" class="btn btn-sm btn-danger btn-delete">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="programStudiModal" tabindex="-1" aria-labelledby="programStudiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programStudiModalLabel">Tambah Program Studi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASE_URL ?>program-studi/store" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="program_studi" class="col-form-label">Nama Program Studi:</label>
                        <input type="text" name="program_studi" class="form-control" id="program_studi" required>
                    </div>
                    <div class="mb-3">
                        <label for="fakultas_id" class="col-form-label">Fakultas:</label>
                        <select name="fakultas_id" id="fakultas_id" class="form-select" required>
                            <option selected value="">--Pilih Fakultas--</option>
                            <?php foreach ($data['fakultas'] as $fakultas) : ?>
                                <option value="<?= $fakultas['id'] ?>"><?= $fakultas['nama_fakultas'] ?></option>
                            <?php endforeach; ?>
                        </select>
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