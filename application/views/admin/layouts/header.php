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

        .topbar {
            background: linear-gradient(135deg, #0077ff, #00c6ff);
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

        /* ACTIVE MENU */
        .nav-menu a.active {
            background: white !important;
            color: #0077ff !important;
            font-weight: bold;
        }

        .container-card {
            max-width: 1100px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

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

        .btn-small {
            background: #0077ff;
            color: white;
            padding: 7px 12px;
            font-size: 13px;
            border-radius: 8px;
            text-decoration: none;
        }

        .btn-small:hover {
            background: #005dd1;
        }
    </style>
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