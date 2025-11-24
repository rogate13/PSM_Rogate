<h2>Pembelian / Donasi</h2>

<?php if (!empty($error)): ?>
    <div class="alert-error"><?= $error ?></div>
<?php endif; ?>

<form method="POST" action="<?= base_url('member/donate/submit') ?>">
    <label>Nominal</label>
    <input type="number" name="amount" min="1" required style="width:80%;padding:12px;border-radius:8px;border:1px solid #ccc; display: block; margin: 0 auto 15px auto;">

    <button type="submit" class="btn-primary" style="background:#ff9800;">Proses</button>
</form>

<a href="<?= base_url('member/profile') ?>" class="back-link">&larr; Kembali</a>