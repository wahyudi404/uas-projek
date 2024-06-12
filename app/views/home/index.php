<div class="container px-4">
    <div class="row mt-4">

        <div class="col-lg-4 col-md-6 col-12 mb-4">

            <div class="card bg-info" style="position: relative; height: 100%;">
                <div class="card-body text-white py-4">
                    <h3 class="card-title"><?= $data['users']['jmlh'] ?></h3>
                    <p class="card-text" style="font-size: small;">Pengguna</p>
                </div>
                <div style="position: absolute; top: 50%; right: 10px; transform: translateY(-75%);">
                    <ion-icon name="document-text-outline" style="font-size: 4.5em; color: rgba(0,0,0,.15);"></ion-icon>
                </div>
                <a href="<?= BASE_URL ?>pengguna" class="btn text-white d-flex justify-content-center align-items-center gap-1" style="border-radius: 0; background: rgba(0,0,0,.1);">
                    <span style="font-size: small;">Lihat selengkapnya</span>
                    <ion-icon name="arrow-forward-circle-outline" style="font-size: large;"></ion-icon>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-4">

            <div class="card bg-primary" style="position: relative; height: 100%;">
                <div class="card-body text-white py-4">
                    <h3 class="card-title"><?= $data['surat_ijin_penelitian']['jmlh'] ?></h3>
                    <p class="card-text" style="font-size: small;">Surat Ijin Penelitian (Skripsi)</p>
                </div>
                <div style="position: absolute; top: 50%; right: 10px; transform: translateY(-75%);">
                    <ion-icon name="document-text-outline" style="font-size: 4.5em; color: rgba(0,0,0,.15);"></ion-icon>
                </div>
                <a href="<?= BASE_URL ?>surat-ijin-penelitian" class="btn text-white d-flex justify-content-center align-items-center gap-1" style="border-radius: 0; background: rgba(0,0,0,.1);">
                    <span style="font-size: small;">Lihat selengkapnya</span>
                    <ion-icon name="arrow-forward-circle-outline" style="font-size: large;"></ion-icon>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-4">

            <div class="card bg-success" style="position: relative; height: 100%;">
                <div class="card-body text-white py-4">
                    <h3 class="card-title"><?= $data['surat_ket_mhs_aktif']['jmlh'] ?></h3>
                    <p class="card-text" style="font-size: small;">Surat Keterangan Mahasiswa Aktif (Umum)</p>
                </div>
                <div style="position: absolute; top: 50%; right: 10px; transform: translateY(-75%);">
                    <ion-icon name="document-text-outline" style="font-size: 4.5em; color: rgba(0,0,0,.15);"></ion-icon>
                </div>
                <a href="<?= BASE_URL ?>surat-ket-mhs-aktif" class="btn text-white d-flex justify-content-center align-items-center gap-1" style="border-radius: 0; background: rgba(0,0,0,.1);">
                    <span style="font-size: small;">Lihat selengkapnya</span>
                    <ion-icon name="arrow-forward-circle-outline" style="font-size: large;"></ion-icon>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-4">

            <div class="card bg-warning" style="position: relative; height: 100%;">
                <div class="card-body text-white py-4">
                    <h3 class="card-title"><?= $data['surat_ket_mhs']['jmlh'] ?></h3>
                    <p class="card-text" style="font-size: small;">Surat Keterangan Mahasiswa (Tunjangan) </p>
                </div>
                <div style="position: absolute; top: 50%; right: 10px; transform: translateY(-75%);">
                    <ion-icon name="document-text-outline" style="font-size: 4.5em; color: rgba(0,0,0,.15);"></ion-icon>
                </div>
                <a href="<?= BASE_URL ?>surat-ket-mhs" class="btn text-white d-flex justify-content-center align-items-center gap-1" style="border-radius: 0; background: rgba(0,0,0,.1);">
                    <span style="font-size: small;">Lihat selengkapnya</span>
                    <ion-icon name="arrow-forward-circle-outline" style="font-size: large;"></ion-icon>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-4">

            <div class="card bg-danger" style="position: relative; height: 100%;">
                <div class="card-body text-white py-4">
                    <h3 class="card-title"><?= $data['surat_rekomendasi_kampus']['jmlh'] ?></h3>
                    <p class="card-text" style="font-size: small;">Surat Rekomendasi Kampus </p>
                </div>
                <div style="position: absolute; top: 50%; right: 10px; transform: translateY(-75%);">
                    <ion-icon name="document-text-outline" style="font-size: 4.5em; color: rgba(0,0,0,.15);"></ion-icon>
                </div>
                <a href="<?= BASE_URL ?>surat-rekomendasi-kampus" class="btn text-white d-flex justify-content-center align-items-center gap-1" style="border-radius: 0; background: rgba(0,0,0,.1);">
                    <span style="font-size: small;">Lihat selengkapnya</span>
                    <ion-icon name="arrow-forward-circle-outline" style="font-size: large;"></ion-icon>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-4">

            <div class="card bg-secondary" style="position: relative; height: 100%;">
                <div class="card-body text-white py-4">
                    <h3 class="card-title"><?= $data['surat_umum']['jmlh'] ?></h3>   
                    <p class="card-text" style="font-size: small;">Surat Umum (Observasi, Kunjungan, Dll) </p>
                </div>
                <div style="position: absolute; top: 50%; right: 10px; transform: translateY(-75%);">
                    <ion-icon name="document-text-outline" style="font-size: 4.5em; color: rgba(0,0,0,.15);"></ion-icon>
                </div>
                <a href="<?= BASE_URL ?>surat-umum" class="btn text-white d-flex justify-content-center align-items-center gap-1" style="border-radius: 0; background: rgba(0,0,0,.1);">
                    <span style="font-size: small;">Lihat selengkapnya</span>
                    <ion-icon name="arrow-forward-circle-outline" style="font-size: large;"></ion-icon>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-4">

            <div class="card bg-dark" style="position: relative; height: 100%;">
                <div class="card-body text-white py-4">
                    <h3 class="card-title"><?= $data['surat_khusus']['jmlh'] ?></h3>
                    <p class="card-text" style="font-size: small;">Surat Khusus (Kampus Mengajar, Dll) </p>
                </div>
                <div style="position: absolute; top: 50%; right: 10px; transform: translateY(-75%);">
                    <ion-icon name="document-text-outline" style="font-size: 4.5em; color: rgba(0,0,0,.15);"></ion-icon>
                </div>
                <a href="<?= BASE_URL ?>surat-khusus" class="btn text-white d-flex justify-content-center align-items-center gap-1" style="border-radius: 0; background: rgba(0,0,0,.1);">
                    <span style="font-size: small;">Lihat selengkapnya</span>
                    <ion-icon name="arrow-forward-circle-outline" style="font-size: large;"></ion-icon>
                </a>
            </div>
        </div>

    </div>
</div>