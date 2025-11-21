<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo isset($title) ? $title : 'Konsultasi Hukum'; ?></title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .card {
            transition: all 0.3s ease;
            border-radius: 8px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title a {
            color: #2c3e50;
            text-decoration: none;
        }

        .card-title a:hover {
            color: #3498db;
        }

        .modal-content {
            border-radius: 10px;
        }

        #iconPreview {
            width: 20px;
            text-align: center;
        }

        .input-group-text {
            min-width: 40px;
        }

        .navbar-nav .nav-link {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
        }

        .nav-icon {
            font-size: 1.2rem;
            margin-right: 8px;
            width: 20px;
            text-align: center;
        }

        .brand-icon {
            font-size: 1.8rem;
            margin-right: 10px;
        }

        @media (max-width: 991.98px) {
            .navbar-nav {
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url(); ?>">
                <i class="fas fa-balance-scale brand-icon"></i>
                <span class="d-none d-sm-inline">Konsultasi Hukum</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php echo (isset($active_menu) && $active_menu == 'perizinan' ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo site_url('perizinan'); ?>">
                            <i class="fas fa-file-signature nav-icon"></i>
                            <span>Perizinan</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo (isset($active_menu) && $active_menu == 'legal_docs' ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo site_url('legal-docs'); ?>">
                            <i class="fas fa-file-contract nav-icon"></i>
                            <span>Legal Docs</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo (isset($active_menu) && $active_menu == 'db_hukum' ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo site_url('db-hukum'); ?>">
                            <i class="fas fa-database nav-icon"></i>
                            <span>DB Hukum</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('logout'); ?>">
                                <i class="fas fa-sign-out-alt nav-icon"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('login'); ?>">
                                <i class="fas fa-sign-in-alt nav-icon"></i>
                                <span>Login</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">