<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - PSM Rogate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f5f7fb;
        }

        /* ============================
       TOPBAR
    ============================ */
        .topbar {
            background: linear-gradient(135deg, #0077ff, #00c6ff);
            padding: 15px 25px;
            color: white;
            font-size: 20px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            /* RESPONSIVE FIX */
            gap: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        }

        /* ============================
       NAVBAR
    ============================ */
        .nav-menu {
            display: flex;
            flex-wrap: wrap;
            /* RESPONSIVE FIX */
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
            /* Biar gak pecah */
        }

        .nav-menu a:hover {
            background: rgba(255, 255, 255, 0.35);
        }

        .nav-menu a.active {
            background: white !important;
            color: #0077ff !important;
            font-weight: bold;
        }

        /* ============================
       CONTENT WRAPPER
    ============================ */
        .container-card {
            max-width: 1100px;
            width: 95%;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        /* ============================
       TABLE STYLE
    ============================ */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #f0f4ff;
            font-weight: bold;
        }

        tr:hover td {
            background: #f9fbff;
        }

        /* ============================
       BUTTONS
    ============================ */
        .btn-small {
            background: #0077ff;
            color: white;
            padding: 7px 12px;
            font-size: 13px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-small:hover {
            background: #005dd1;
        }

        /* ============================
       RESPONSIVE ADMIN
    ============================ */
        @media (max-width: 600px) {
            .topbar {
                padding: 12px 15px;
                font-size: 18px;
            }

            .container-card {
                padding: 20px;
            }

            table th,
            table td {
                font-size: 13px;
                padding: 8px;
            }

            .btn-small {
                font-size: 12px;
                padding: 6px 10px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php
    $uri = uri_string();
    ?>

    <div class="topbar">
        <span>PSM Rogate — Admin Dashboard</span>

        <div class="nav-menu">

            <a href="<?= base_url('admin/members') ?>"
                class="<?= (strpos($uri, 'admin/members') === 0) ? 'active' : '' ?>">
                Home
            </a>

            <a href="<?= base_url('admin/transactions') ?>"
                class="<?= ($uri === 'admin/transactions') ? 'active' : '' ?>">
                Transaksi
            </a>

            <a href="<?= base_url('logout') ?>" class="logout-btn">Logout</a>

        </div>
    </div>

    <div class="container-card">