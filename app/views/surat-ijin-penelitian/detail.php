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


            <table style="margin-bottom: 1.5vw;">
                <tr>
                    <td>Nomor</td>
                    <td>: <span style="margin-left: 3em;">/UNIWARA/LT/<?= $data['surat']['tahun'] ?></span></td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td>: -</td>
                </tr>
                <tr>
                    <td>Perihal</td>
                    <td>: <u><b>Permohonan Ijin Penelitian</b></u></td>
                </tr>
            </table>

            <p style="margin-bottom: 1.5vw;">
                Yth: <b><?php echo $data['surat']['yth_kpd'] ?></b> <br>
                di - <br>
                <b><?= $data['surat']['tempat_penelitian'] ?></b>
            </p>

            <p style="margin-bottom: 1vw;">
                Sehubungan dengan tugas mahasiswa kami untuk mengadakan penelitian guna penulisan tugas akhir, maka kami mohon dengan hormat, agar diijinkan untuk mengadakan penelitian di Instansi/Dinas Saudara, atas nama :
            </p>
            <table class="table-report" border="0">
                <tr>
                    <td>Nama</td>
                    <td>: <?= $data['surat']['nama'] ?></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>: <?= $data['surat']['tempat_lahir'] ?>, <?= date('d M Y', strtotime($data['surat']['tanggal_lahir'])) ?></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>: <?= $data['surat']['nim'] ?></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td>: <?= $data['surat']['nama_fakultas'] ?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>: <?= $data['surat']['program_studi'] ?></td>
                </tr>
                <tr>
                    <td>Judul Penelitian</td>
                    <td>: <b>"<?= $data['surat']['judul'] ?>"</b></td>
                </tr>
            </table>
            <p style="margin-bottom: 2vw;">
                Atas perkenan dan kerjasama yang baik kami sampaikan terima kasih.
            </p>
        </div>
    </div>

</div>