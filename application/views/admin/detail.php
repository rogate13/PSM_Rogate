<h2>Detail Member</h2>

<p><b>ID:</b> <?= $member['id'] ?></p>
<p><b>Nama:</b> <?= $member['full_name'] ?></p>
<p><b>Email:</b> <?= $member['email'] ?></p>
<p><b>Saldo:</b> <?= number_format($member['current_balance']) ?></p>

<a href="<?= base_url('admin/members') ?>">&larr; Kembali</a>
