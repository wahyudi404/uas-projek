<!DOCTYPE html>
<html lang="en">

<head>
    <title>Surat Keterangan Mahasiswa Aktif</title>

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

            <h1 style="font-size: large; text-align: center;"><b>SURAT REKOMENDASI</b></h1>
            <p style="text-align: center;">Nomor: <span style="margin-left: 3em;">/UNIWARA/KL/{{tahun_sekarang}}</span></p>

            <p style="margin-bottom: 10px;">
                Yang bertanda tangan di bawah ini:
            </p>

            <table style="margin-left: 2em; width: 100%; margin-bottom: 1em;" class="table-report" border="0">
                <tr>
                    <td style="width: 25%;">Nama</td>
                    <td>: {{nama_perekomendasi}}</td>
                </tr>
                <tr>
                    <td style="width: 25%;">Jabatan</td>
                    <td>: {{jabatan}}</td>
                </tr>
                <tr>
                    <td style="width: 25%;">NIDN</td>
                    <td>: {{nidn}}</td>
                </tr>
            </table>

            <p style="margin-bottom: 10px;">
                Dengan ini memberikan rekomendasi kepada:
            </p>

            <table style="margin-left: 2em; width: 100%; margin-bottom: 1em;" class="table-report" border="0">
                <tr>
                    <td style="width: 25%;">Nama</td>
                    <td>: {{nama_mhs}}</td>
                </tr>
                <tr>
                    <td style="width: 25%;">NIM</td>
                    <td>: {{nim}}</td>
                </tr>
                <tr>
                    <td style="width: 25%;">Program Studi/Jurusan</td>
                    <td>: {{program_studi}}</td>
                </tr>
                <tr>
                    <td style="width: 25%;">Fakultas</td>
                    <td>: {{nama_fakultas}}</td>
                </tr>
                <tr>
                    <td style="width: 25%;">Semester</td>
                    <td>: {{semester}}</td>
                </tr>
                <tr>
                    <td style="width: 25%;">IPK</td>
                    <td>: {{ipk}}</td>
                </tr>
            </table>

            <p>
                Untuk menjadi {{untuk_menjadi}}
            </p>

            <p>
                Dengan ini, kami menyatakan bahwa yang bersangkutan benar-benar terdaftar sebagai mahasiswa aktif pada Program Studi {{program_studi}} Fakultas {{nama_fakultas}} Universitas PGRI Wiranegara tahun akademik {{tahun_akademik}}.
            </p>

            <p>
                Demikian surat rekomendasi ini kami sampaikan untuk dipergunakan sebagaimana mestinya.
            </p>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>