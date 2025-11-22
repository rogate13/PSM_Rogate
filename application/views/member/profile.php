<h2>Profil Saya</h2>

<p><b>Nama:</b> <?= $member['full_name'] ?></p>
<p><b>Email:</b> <?= $member['email'] ?></p>
<p><b>Telepon:</b> <?= $member['phone'] ?></p>
<p><b>Saldo:</b> <?= number_format($member['current_balance']) ?></p>
