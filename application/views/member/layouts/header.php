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
            flex-wrap: wrap;
            /* FIX RESPONSIVE */
            gap: 10px;
            /* FIX RESPONSIVE */
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        }

        .nav-menu {
            display: flex;
            flex-wrap: wrap;
            /* FIX RESPONSIVE */
            gap: 8px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            padding: 8px 15px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.20);
            transition: 0.2s;
            white-space: nowrap;
            /* mencegah pecah */
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
            width: 90%;
            /* FIX RESPONSIVE */
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .btn-primary {
            display: block;
            width: 80%;
            /* SESUAI KEINGINAN */
            margin: 15px auto 0 auto;
            padding: 12px;
            background: #ff4b4b;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
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

        .container-card table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }

        .container-card th,
        .container-card td {
            border: 1px solid #e0e0e0;
            padding: 10px 8px;
        }

        .container-card th {
            background-color: #f8f8f8;
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
        }

        .container-card td:nth-child(2),
        .container-card td:nth-child(3),
        .container-card td:nth-child(4),
        .container-card td:nth-child(5) {
            text-align: right;
            white-space: nowrap;
        }

        .container-card tr:nth-child(even) {
            background-color: #fcfcfc;
        }

        .container-card tr:hover {
            background-color: #f0f8ff;
        }

        /* ========================
        RESPONSIVE MOBILE FIX
       ======================== */
        @media (max-width: 480px) {
            .topbar {
                padding: 12px 15px;
                font-size: 18px;
            }

            .nav-menu a {
                font-size: 12px;
                padding: 6px 10px;
            }

            .container-card {
                padding: 20px;
            }

            .btn-primary {
                width: 90%;
                /* biar lebih nyaman di HP */
            }
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