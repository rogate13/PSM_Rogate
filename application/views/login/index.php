<div class="login-container">

    <div class="login-card">
        <div class="brand-area">
            <img src="<?= base_url('img/wallet.png') ?>" class="brand-icon" alt="Wallet Icon">
            <h2 class="brand-title">PSM Wallet</h2>
            <p class="brand-subtitle">Secure Member Balance System</p>
        </div>

        <?php if (!empty($error)) : ?>
            <div class="alert-error"><?= $error ?></div>
        <?php endif; ?>

        <form action="<?= site_url('login/authenticate') ?>" method="POST">
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter username..." required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password..." required>

            <button type="submit" class="btn-login">MASUK</button>
        </form>
    </div>

</div>
