<h2>Topup Saldo</h2>

<?php if (!empty($error)): ?>
    <div style="color:red;"><?= $error ?></div>
<?php endif; ?>

<form method="POST" action="<?= base_url('member/topup/submit') ?>">
    <label>Nominal Topup</label>
    <input type="number" name="amount" min="1" required>

    <br><br>
    <button type="submit">Topup</button>
</form>

<br>
<a href="<?= base_url('member/profile') ?>">&larr; Kembali</a>
