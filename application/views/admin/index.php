<h2>Data Member</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Saldo</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($members as $m): ?>
    <tr>
        <td><?= $m['id'] ?></td>
        <td><?= $m['member_code'] ?></td>
        <td><?= $m['full_name'] ?></td>
        <td><?= $m['email'] ?></td>
        <td><?= number_format($m['current_balance']) ?></td>
        <td><a href="<?= base_url('admin/members/'.$m['id']) ?>">Detail</a></td>
    </tr>
    <?php endforeach; ?>
</table>
