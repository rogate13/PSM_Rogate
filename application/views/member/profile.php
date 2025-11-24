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
">
    Rp <?= number_format($member['current_balance']) ?>
</div>

<a class="btn-primary" href="<?= base_url('member/topup') ?>">TOPUP SALDO</a>

<a class="btn-primary btn-orange"
    href="<?= base_url('member/donate') ?>"
    style="margin-top:10px;">
    DONASI / PEMBELIAN
</a>

<a href="<?= base_url('member/transactions') ?>" class="back-link">
    Lihat Riwayat Transaksi →
</a>

<?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= $this->session->flashdata("success") ?>',
            confirmButtonColor: '#ff4b4b'
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('login_success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Welcome!',
            text: '<?= $this->session->flashdata("login_success") ?>',
            confirmButtonColor: '#ff4b4b'
        });
    </script>
<?php endif; ?>