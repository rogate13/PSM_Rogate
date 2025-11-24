<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Member - PSM Rogate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f5f7fb;
        }

        .topbar {
            background: linear-gradient(135deg, #ff4b4b, #ff9800);
            padding: 15px 25px;
            color: white;
            font-size: 20px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            padding: 8px 15px;
            border-radius: 8px;
            margin-left: 8px;
            background: rgba(255, 255, 255, 0.20);
            transition: 0.2s;
        }

        .nav-menu a:hover {
            background: rgba(255, 255, 255, 0.35);
        }

        .nav-menu a.active {
            background: white !important;
            color: #ff4b4b !important;
            font-weight: bold;
        }

        .container-card {
            max-width: 500px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .btn-primary {
            /* display: block; (Tetap dipertahankan untuk mengizinkan 'margin: auto') */
            display: block;

            /* Ubah width menjadi lebih kecil */
            width: 80%;
            /* Lebar tombol menjadi 80% dari kontainer */

            /* Tambahkan 'margin: 15px auto 0 auto;' untuk memusatkannya */
            margin: 15px auto 0 auto;

            padding: 12px;
            background: #ff4b4b;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            /* margin-top: 15px; (Dihapus karena sudah ada di properti 'margin') */
            text-align: center;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: #d83838;
        }

        .btn-orange {
            background: #ff9800 !important;
        }

        .back-link {
            color: #ff4b4b;
            text-decoration: none;
            font-weight: bold;
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        /* Styling untuk membuat tabel menjadi rapi dan mudah dibaca */
        .container-card table {
            width: 100%;
            border-collapse: collapse;
            /* Menghilangkan spasi ganda antar border */
            margin-top: 20px;
            font-size: 14px;
        }

        .container-card th,
        .container-card td {
            border: 1px solid #e0e0e0;
            padding: 10px 8px;
            text-align: left;
            /* Default text-align untuk Tipe */
        }

        .container-card th {
            background-color: #f8f8f8;
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Penyesuaian lebar dan perataan kolom angka dan tanggal */
        .container-card td:nth-child(2),
        /* Nominal */
        .container-card td:nth-child(3),
        /* Sebelum */
        .container-card td:nth-child(4),
        /* Sesudah */
        .container-card td:nth-child(5)

        /* Tanggal */
            {
            text-align: right;
            /* Rata kanan untuk angka dan tanggal */
            white-space: nowrap;
            /* Mencegah pemisahan baris pada tanggal/nominal */
        }

        /* Warna latar belakang bergantian (zebra stripping) */
        .container-card tr:nth-child(even) {
            background-color: #fcfcfc;
        }

        .container-card tr:hover {
            background-color: #f0f8ff;
            /* Warna saat hover */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php $uri = uri_string(); ?>

    <div class="topbar">
        <span>PSM Rogate — Member Area</span>

        <div class="nav-menu">
            <a href="<?= base_url('member/profile') ?>"
                class="<?= (strpos($uri, 'member/profile') === 0) ? 'active' : '' ?>">Profil</a>

            <a href="<?= base_url('member/topup') ?>"
                class="<?= (strpos($uri, 'member/topup') === 0) ? 'active' : '' ?>">Topup</a>

            <a href="<?= base_url('member/donate') ?>"
                class="<?= (strpos($uri, 'member/donate') === 0) ? 'active' : '' ?>">Donasi</a>

            <a href="<?= base_url('member/transactions') ?>"
                class="<?= (strpos($uri, 'member/transactions') === 0) ? 'active' : '' ?>">Transaksi</a>

            <a href="<?= base_url('logout') ?>">Logout</a>
        </div>
    </div>

    <div class="container-card">