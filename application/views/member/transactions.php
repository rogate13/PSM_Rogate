<h2>Riwayat Transaksi Saya</h2>

<table>
    <tr>
        <th>Tipe</th>
        <th>Nominal</th>
        <th>Sebelum</th>
        <th>Sesudah</th>
        <th>Tanggal</th>
    </tr>

    <?php foreach ($list as $t): ?>
    <tr>
        <td><?= $t['name'] ?></td>
        <td><?= number_format($t['amount']) ?></td>
        <td><?= number_format($t['balance_before']) ?></td>
        <td><?= number_format($t['balance_after']) ?></td>
        <td><?= $t['created_at'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="<?= base_url('member/profile') ?>" class="back-link">&larr; Kembali</a>
