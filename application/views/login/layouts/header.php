<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - PSM Rogate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #0077ff, #00c6ff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: white;
            padding: 32px;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            text-align: center;
            animation: fadeIn 0.5s ease;
        }

        .brand-area {
            margin-bottom: 20px;
        }

        .brand-icon {
            width: 60px;
            filter: drop-shadow(0 3px 4px rgba(0,0,0,0.2));
        }

        .brand-title {
            margin: 10px 0 0;
            font-size: 24px;
            font-weight: bold;
        }

        .brand-subtitle {
            font-size: 14px;
            color: #666;
            margin-top: 2px;
        }

        label {
            font-weight: 600;
            display: block;
            text-align: left;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-top: 5px;
            font-size: 15px;
        }

        .btn-login {
            width: 100%;
            margin-top: 22px;
            padding: 12px;
            background: #0077ff;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #005dd1;
        }

        .alert-error {
            background: #ffdddd;
            border-left: 4px solid #ff4b4b;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            color: #b30000;
            font-size: 14px;
            text-align: left;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>
