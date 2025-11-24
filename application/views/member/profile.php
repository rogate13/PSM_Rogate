<h2>Profil Saya</h2>

<p><b>Nama:</b> <?= $member['full_name'] ?></p>
<p><b>Email:</b> <?= $member['email'] ?></p>
<p><b>Telepon:</b> <?= $member['phone'] ?></p>

<hr style="margin:20px 0;">

<h3>Saldo Anda</h3>
<div style="
    background: linear-gradient(135deg,#0077ff,#00c6ff);
    padding: 25px;
    color: white;
    border-radius: 14px;
    font-size: 24px;
    font-weight: bold;
    text-align:center;
    margin-bottom: 20px;
">
    Rp <?= number_format($member['current_balance']) ?>
</div>

<a class="btn-primary" href="<?= base_url('member/topup') ?>">TOPUP SALDO</a>
<a class="btn-primary" href="<?= base_url('member/donate') ?>" style="margin-top:10px;background:#ff9800;">DONASI / PEMBELIAN</a>

<a href="<?= base_url('member/transactions') ?>" class="back-link" style="display:block;text-align:center;margin-top:20px;">
    Lihat Riwayat Transaksi →
</a>
