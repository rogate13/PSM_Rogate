<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member - PSM Wallet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f5f7fb;
        }

        .topbar {
            background: linear-gradient(135deg, #0077ff, #00c6ff);
            padding: 15px 22px;
            color: white;
            font-size: 20px;
            font-weight: bold;
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar a {
            color: white;
            text-decoration: none;
            background: rgba(255,255,255,0.25);
            padding: 7px 14px;
            border-radius: 10px;
            transition: 0.2s;
            font-size: 13px;
        }

        .topbar a:hover {
            background: rgba(255,255,255,0.4);
        }

        .container-card {
            max-width: 450px;
            margin: 32px auto;
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        input, button {
            font-family: inherit;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background: #0077ff;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 15px;
        }

        .btn-primary:hover {
            background: #005dc7;
        }

        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }

        th {
            background: #eef3ff;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        tr:hover td {
            background: #f7faff;
        }

        .alert-error {
            background: #ffdddd;
            padding: 10px;
            border-left: 4px solid #ff4b4b;
            border-radius: 6px;
            margin-bottom: 15px;
            color: #b30000;
            font-size: 14px;
        }

        .back-link {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #0077ff;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="topbar">
    <span>PSM Wallet – Member</span>
    <a href="<?= base_url('logout') ?>">Logout</a>
</div>

<div class="container-card">
