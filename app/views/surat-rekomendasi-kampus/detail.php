<div class="px-4">
    <div class="mb-4 d-flex justify-content-between">
        <a href="<?= BASE_URL . $data['page'] ?>" class="btn btn-outline-primary">Kembali</a>
        <!-- <button type="button" id="print" data-nama="<?= $data['surat']['nama'] ?>" data-nim="<?= $data['surat']['nim'] ?>" class="btn btn-primary">Download PDF</button> -->
        <a href="<?= BASE_URL . $data['page'] ?>/printPDF/<?= $data['surat']['id'] ?>" class="btn btn-primary">Download PDF</a>
    </div>

    <div id="preview" class="mx-auto border">
        <div style="font-family: 'Times New Roman'; font-size: 1vw;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <img src="<?= BASE_URL ?>img/LOGO-UNIWARA.png" alt="Logo Uniwara" style="width: 25%;">
                <div>
                    <div style="font-size: 1.2vw; font-weight: 600;" class="text-center text-uppercase">
                        UNIVERSITAS PGRI WIRANEGARA <span style="color: #ef4444;">(UNIWARA)</span>
                    </div>
                    <div style="font-size: 1.8vw; font-weight: 600;" class="text-center text-uppercase">
                        <?= $data['surat']['nama_fakultas'] ?>
                    </div>
                    <div style="font-size: 0.6vw;">Jl. Ki Hajar Dewantara 27 – 29 PasuruanTelp. (0343) 421948 Fax. (0343) 411086 Email. univ.pgriwiranegara@gmail.com Web. www.uniwara.ac.id</div>
                    <div style="display: flex; font-size: 0.6vw; gap: 20px;">
                        <?php foreach ($data['fps'] as $value) : ?>
                            <ul style="list-style: none; margin: 0; padding: 0;">
                                <li><b><?= $value->nama_fakultas; ?></b></li>
                                <?php foreach ($value->program_studies as $program_studi) : ?>
                                    <li><?= $program_studi['program_studi'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

            <div style="width: 100%; border: 2px solid grey; margin: 1.5vw 0;"></div>

            <h1 style="font-size: large; text-align: center;"><b>SURAT REKOMENDASI</b></h1>
            <p style="text-align: center; font-weight: 700;">Nomor: <span style="margin-left: 3em;">/UNIWARA/KL/<?= $data['surat']['tahun_sekarang'] ?></span></p>

            <p style="margin-bottom: 1vw;">
                Yang bertanda tangan di bawah ini:
            </p>

            <table style="margin-left: 2em;" class="table-report" border="0">
                <tr>
                    <td style="width: 25%;">Nama</td>
                    <td>: <?= $data['surat']['nama_perekomendasi'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Jabatan</td>
                    <td>: <?= $data['surat']['jabatan'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">NIDN</td>
                    <td>: <?= $data['surat']['nidn'] ?></td>
                </tr>
            </table>

            <p style="margin-bottom: 1vw;">
                Dengan ini memberikan rekomendasi kepada:
            </p>

            <table style="margin-left: 2em;" class="table-report" border="0">
                <tr>
                    <td style="width: 25%;">Nama</td>
                    <td>: <?= $data['surat']['nama_mhs'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">NIM</td>
                    <td>: <?= $data['surat']['nim'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Program Studi/Jurusan</td>
                    <td>: <?= $data['surat']['program_studi'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Fakultas</td>
                    <td>: <?= $data['surat']['nama_fakultas'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Semester</td>
                    <td>: <?= $data['surat']['semester'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">IPK</td>
                    <td>: <?= $data['surat']['ipk'] ?></td>
                </tr>
            </table>

            <p>
                Untuk Menjadi <?= $data['surat']['untuk_menjadi'] ?>
            </p>

            <p>
                Dengan ini, kami menyatakan bahwa yang bersangkutan benar-benar terdaftar sebagai mahasiswa aktif pada Program Studi <?= $data['surat']['program_studi'] ?> Fakultas <?= $data['surat']['nama_fakultas'] ?> Universitas PGRI Wiranegara tahun akademik <?= $data['surat']['tahun_akademik'] ?>.
            </p>

            <p>Demikian surat rekomendasi ini kami sampaikan untuk dipergunakan sebagaimana mestinya.</p>
        </div>
    </div>

</div>