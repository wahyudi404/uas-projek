<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        .error-page {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .error-page h1 {
            font-size: 10rem;
            margin-bottom: 0;
            display: flex;
            align-items: center;
        }

        .error-page h1 .emote {
            font-size: 8rem;
            font-weight: 600;
            animation: bounce 1.2s infinite;
        }

        .error-page p {
            font-size: 2rem;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-30px);
            }

            60% {
                transform: translateY(-15px);
            }
        }
    </style>
</head>

<body>
    <div class="error-page">
        <h1 class="text-danger">
            4<span class="emote">☹</span>4
        </h1>
        <p class="text-center">Oops! Halaman yang Anda cari tidak ditemukan.</p>
        <a href="<?= BASE_URL ?>" class="btn btn-primary">Kembali</a>
    </div>
</body>

</html>