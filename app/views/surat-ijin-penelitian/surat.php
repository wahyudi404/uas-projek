<!DOCTYPE html>
<html lang="en">

<head>
    <title>Surat Ijin Penelitian</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="mx-auto" style="line-height: 1.5;">
        <div style="font-family: 'Times New Roman'; font-size: 14px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 25%; text-align: left;">
                        <img style="display: inline-block; width: 100%;" src="{{BASE_URL}}img/LOGO-UNIWARA.png" alt="Logo Uniwara">
                    </td>
                    <td style="width: 75%; text-align: center; padding-top: 20px;">
                        <div style="font-size: 14px; font-weight: 600;" class="text-center text-uppercase">
                            UNIVERSITAS PGRI WIRANEGARA <span style="color: #ef4444;">(UNIWARA)</span>
                        </div>
                        <div style="font-size: 24px; font-weight: 600;" class="text-center text-uppercase">
                            {{nama_fakultas}}
                        </div>
                        <div style="font-size: 10px;">Jl. Ki Hajar Dewantara 27 – 29 PasuruanTelp. (0343) 421948 Fax. (0343) 411086 Email. <a href="mailto:univ.pgriwiranegara@gmail.com">univ.pgriwiranegara@gmail.com</a> Web. <a href="www.uniwara.ac.id">www.uniwara.ac.id</a></div>
                        <table style="font-size: 10px; margin-top: 5px;">
                            <tr>
                            {{fps}}
                            </tr>
                        </table>
                    </td>>
                </tr>
            </table>

            <div style="width: 100%; border: 2px solid grey; margin: 20px 0;"></div>

            <table style="width: 100%; margin-bottom: 20px;">
                <tr>
                    <td style="width: 10%;">Nomor</td>
                    <td>: <span style="margin-left: 3em;">/UNIWARA/LT/{{tahun}}</span></td>
                </tr>
                <tr>
                    <td style="width: 10%;">Lampiran</td>
                    <td>: -</td>
                </tr>
                <tr>
                    <td style="width: 10%;">Perihal</td>
                    <td>: <u><b>Permohonan Ijin Penelitian</b></u></td>
                </tr>
            </table>

            <p style="margin-bottom: 10px;">
                Yth: <b>{{yth_kpd}}</b>
                <br>
                <span style="margin-left: 2em;">di - <b>{{tempat_penelitian}}</b></span>
            </p>

            <br>

            <p>Sehubungan dengan tugas mahasiswa kami untuk mengadakan penelitian guna penulisan tugas akhir, maka kami mohon dengan hormat, agar diijinkan untuk mengadakan penelitian di Instansi/Dinas Saudara, atas nama :</p>
            <table style="width: 100%; margin-bottom: 20px;" border="0">
                <tr>
                    <td style="width: 25%; padding: 5px 0;">Nama</td>
                    <td>: {{nama}}</td>
                </tr>
                <tr>
                    <td style="width: 25%; padding: 5px 0;">Tempat, Tanggal Lahir</td>
                    <td>: {{tempat_lahir}}, {{tanggal_lahir}}</td>
                </tr>
                <tr>
                    <td style="width: 25%; padding: 5px 0;">NIM</td>
                    <td>: {{nim}}</td>
                </tr>
                <tr>
                    <td style="width: 25%; padding: 5px 0;">Fakultas</td>
                    <td>: {{nama_fakultas}}</td>
                </tr>
                <tr>
                    <td style="width: 25%; padding: 5px 0;">Program Studi</td>
                    <td>: {{program_studi}}</td>
                </tr>
                <tr>
                    <td style="width: 25%; padding: 5px 0;">Judul Penelitian</td>
                    <td>: <b>"{{judul}}"</b></td>
                </tr>
            </table>
            <p>Atas perkenan dan kerjasama yang baik kami sampaikan terima kasih.</p>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>