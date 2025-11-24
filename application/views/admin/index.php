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
            <td>
                <a class="btn-small" href="<?= base_url('admin/members/' . $m['id']) ?>">Detail</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= $this->session->flashdata("success") ?>',
            confirmButtonColor: '#4b51ffff'
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('login_success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Welcome!',
            text: '<?= $this->session->flashdata("login_success") ?>',
            confirmButtonColor: '#4b51ffff'
        });
    </script>
<?php endif; ?>