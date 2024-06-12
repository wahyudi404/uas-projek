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

            <h1 style="font-size: large; text-align: center;"><b><u>SURAT KETERANGAN</u></b></h1>
            <p style="text-align: center;">Nomor: <span style="margin-left: 3em;">/UNIWARA.5/KM/<?= $data['surat']['tahun_sekarang'] ?></span></p>

            <p style="margin-bottom: 1vw;">
                Yang bertanda tangan di bawah ini Dekan Fakultas <?= $data['surat']['nama_fakultas'] ?> Universitas PGRI Wiranegara menerangkan dengan sesungguhnya bahwa :
            </p>

            <table style="margin-left: 2em;" class="table-report" border="0">
                <tr>
                    <td style="width: 25%;">Nama</td>
                    <td>: <?= $data['surat']['nama'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Tempat, Tanggal Lahir</td>
                    <td>: <?= $data['surat']['tempat_lahir'] ?>, <?= date('d M Y', strtotime($data['surat']['tanggal_lahir'])) ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Alamat</td>
                    <td>: <?= $data['surat']['alamat_desa_kel'] ?> <br> <?= $data['surat']['alamat_kec_kota'] ?></td>
                </tr>
            </table>

            <p style="margin-bottom: 1vw;">
                Yang bersangkutan Saat ini terdaftar sebagai mahasiswa Universitas PGRI Wiranegara pada :
            </p>

            <table style="margin-left: 2em;" class="table-report" border="0">
                <tr>
                    <td style="width: 25%;">Fakultas</td>
                    <td>: <?= $data['surat']['nama_fakultas'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Program Studi</td>
                    <td>: <?= $data['surat']['program_studi'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">NIM</td>
                    <td>: <?= $data['surat']['nim'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Thn. Akademik/Smt</td>
                    <td>: <?= $data['surat']['tahun_akademik'] ?>/<?= $data['surat']['semester'] ?></td>
                </tr>
            </table>

            <p style="margin-bottom: 1vw;">
                Dan bahwa wali anak tersebut adalah :
            </p>

            <table style="margin-left: 2em;" class="table-report" border="0">
                <tr>
                    <td style="width: 25%;">Nama</td>
                    <td>: <?= $data['surat']['nama_ortu'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">NIP</td>
                    <td>: <?= $data['surat']['nip'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Pangkat/Gol.</td>
                    <td>: <?= $data['surat']['golongan'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Instansi</td>
                    <td>: <?= $data['surat']['instansi'] ?></td>
                </tr>
            </table>
            <p>
                Surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.
            </p>
        </div>
    </div>

</div>