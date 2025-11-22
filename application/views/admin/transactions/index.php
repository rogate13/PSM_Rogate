<h2>Semua Transaksi</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Member</th>
        <th>Tipe</th>
        <th>Amount</th>
        <th>Sebelum</th>
        <th>Sesudah</th>
        <th>Channel</th>
        <th>Tanggal</th>
    </tr>

    <?php foreach ($list as $t): ?>
    <tr>
        <td><?= $t['id'] ?></td>
        <td><?= $t['member_name'] ?></td>
        <td><?= $t['type_name'] ?></td>
        <td><?= number_format($t['amount']) ?></td>
        <td><?= number_format($t['balance_before']) ?></td>
        <td><?= number_format($t['balance_after']) ?></td>
        <td><?= $t['channel'] ?></td>
        <td><?= $t['created_at'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
