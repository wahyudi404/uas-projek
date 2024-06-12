<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($data['title']) ? $data['title'] . ' - Surat Ijin Penelitian' : 'Surat Ijin Penelitian' ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Jquery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>css/main.css">

</head>

<body>
    <div id="wrapper" class="container mx-auto bg-white my-3 p-0 py-4">
        <div class="px-4">
            <div class="d-flex flex-wrap justify-content-center align-items-center mb-3">
                <img src="<?= BASE_URL ?>img/LOGO-UNIWARA.png" width="100" alt="logo uniwara">
                <h1 class="fs-3">Surat Online Mahasiswa <br> Universitas PGRI Wiranegara</h1>
            </div>
            
            <p class="ms-3 text-center">
                <!-- <marquee> -->
                Salam untuk mahasiswa Universitas PGRI Wiranegara Pasuruan. BAAK memberikan informasi terkait Surat Ijin Penelitian.
                <!-- </marquee> -->
            </p>
            <p class="ms-3 text-center">
                <marquee>
                    SALAM PATRIOT, GAGAH BERANI TANGGUH.. UNIWARA, JAYA TERKEMUKA.. UNIWARA, GREAT CAMPUS.. APA TEKAD KITA, TERDEPAN DALAM PRESTASI..
                </marquee>
            </p>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php if ($data['page'] == 'home') echo 'active' ?>" aria-current="page" href="<?= BASE_URL ?>">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($data['page'] == 'pengguna') echo 'active' ?>" aria-current="page" href="<?= BASE_URL ?>pengguna">Pengguna</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Surat
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item <?php if ($data['page'] == 'surat-ijin-penelitian') echo 'active' ?>" href="<?= BASE_URL ?>surat-ijin-penelitian">Surat Ijin Penelitian (Skripsi)</a></li>
                                <li><a class="dropdown-item <?php if ($data['page'] == 'surat-ket-mhs-aktif') echo 'active' ?>" href="<?= BASE_URL ?>surat-ket-mhs-aktif">Surat Keterangan Mahasiswa Aktif (Umum)</a></li>
                                <li><a class="dropdown-item <?php if ($data['page'] == 'surat-ket-mhs') echo 'active' ?>" href="<?= BASE_URL ?>surat-ket-mhs">Surat Keterangan Mahasiswa (Tunjangan)</a></li>
                                <li><a class="dropdown-item <?php if ($data['page'] == 'surat-rekomendasi-kampus') echo 'active' ?>" href="<?= BASE_URL ?>surat-rekomendasi-kampus">Surat Rekomendasi Kampus</a></li>
                                <li><a class="dropdown-item <?php if ($data['page'] == 'surat-umum') echo 'active' ?>" href="<?= BASE_URL ?>surat-umum">Surat Umum (Observasi, Kunjungan, Dll)</a></li>
                                <li><a class="dropdown-item <?php if ($data['page'] == 'surat-khusus') echo 'active' ?>" href="<?= BASE_URL ?>surat-khusus">Surat Khusus (Kampus Mengajar, Dll)</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($data['page'] == 'fakultas') echo 'active' ?>" href="<?= BASE_URL ?>fakultas">Fakultas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($data['page'] == 'program-studi') echo 'active' ?>" href="<?= BASE_URL ?>program-studi">Program Studi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($data['page'] == 'kontak-saya') echo 'active' ?>" href="<?= BASE_URL ?>kontak-saya">Kontak Saya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($data['page'] == 'tentang-saya') echo 'active' ?>" href="<?= BASE_URL ?>tentang-saya">Tentang Saya</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?= $_SESSION['auth'] ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?= BASE_URL ?>auth/logout">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="px-4">
            <hr>
        </div>