<div class="container">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 font-weight-bold text-primary">
                <i class="fas fa-file-signature mr-2"></i>Layanan Perizinan
            </h1>
            <p class="lead">Pilih kategori perizinan yang Anda butuhkan</p>
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus mr-2"></i>Tambah Kategori</button>
        </div>
    </div>

    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>

    <div class="row" id="section-list">
        <?php foreach ($sections as $section) : ?>
            <div class="col-md-4 mb-4" id="section-<?= $section->id ?>">
                <div class="card h-100 border-0 shadow transition-all">
                    <div class="card-body text-center p-4">
                        <div class="icon-container bg-light-primary rounded-circle p-3 mb-3 mx-auto">
                            <i class="fas fa-folder-open fa-2x text-primary"></i>
                        </div>
                        <h3 class="card-title"><?= $section->name ?></h3>
                        <p class="card-text text-muted"><?= $section->description ?></p>
                        <a href="<?= site_url('perizinan/' . $section->id) ?>" class="btn btn-primary">
                            <i class="fas fa-arrow-right mr-2"></i>Lihat Layanan
                        </a>
                        <button type="button" class="btn btn-sm btn-warning edit-button" data-id="<?= $section->id ?>" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-sm btn-danger delete-button" data-id="<?= $section->id ?>"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Kategori Perizinan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createForm">
                    <div class="form-group">
                        <label for="name">Nama Kategori:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="saveButton">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Kategori Perizinan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="editId" name="id">
                    <div class="form-group">
                        <label for="editName">Nama Kategori:</label>
                        <input type="text" class="form-control" id="editName" name="name">
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Deskripsi:</label>
                        <textarea class="form-control" id="editDescription" name="description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="updateButton">Update</button>
            </div>
        </div>
    </div>
</div>


<style>
    .transition-all {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .icon-container {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bg-light-primary {
        background-color: rgba(13, 110, 253, 0.1);
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // CREATE
        $('#saveButton').click(function() {
            $.ajax({
                url: '<?= site_url('perizinan/create') ?>',
                type: 'POST',
                dataType: 'json',
                data: $('#createForm').serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        // Tambahkan data baru ke daftar
                        var newSection = `
                            <div class="col-md-4 mb-4" id="section-${response.id}">
                                <div class="card h-100 border-0 shadow transition-all">
                                    <div class="card-body text-center p-4">
                                        <div class="icon-container bg-light-primary rounded-circle p-3 mb-3 mx-auto">
                                            <i class="fas fa-folder-open fa-2x text-primary"></i>
                                        </div>
                                        <h3 class="card-title">${response.data.name}</h3>
                                        <p class="card-text text-muted">${response.data.description}</p>
                                        <a href="<?= site_url('perizinan/') ?>${response.id}" class="btn btn-primary">
                                            <i class="fas fa-arrow-right mr-2"></i>Lihat Layanan
                                        </a>
                                        <button type="button" class="btn btn-sm btn-warning edit-button" data-id="${response.id}" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i> Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger delete-button" data-id="${response.id}"><i class="fas fa-trash"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#section-list').append(newSection);

                        // Tutup modal dan reset form
                        $('#createModal').modal('hide');
                        $('#createForm')[0].reset();

                        // Tampilkan pesan sukses (bisa menggunakan alert atau cara lain)
                        alert(response.message);
                    } else {
                        // Tampilkan pesan error
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        });

        // READ (Untuk mengisi modal edit)
        $('.edit-button').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= site_url('perizinan/get_section/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        $('#editId').val(response.data.id);
                        $('#editName').val(response.data.name);
                        $('#editDescription').val(response.data.description);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        });

        // UPDATE
        $('#updateButton').click(function() {
            var id = $('#editId').val();
            $.ajax({
                url: '<?= site_url('perizinan/update/') ?>' + id,
                type: 'POST',
                dataType: 'json',
                data: $('#editForm').serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        // Update tampilan data
                        $('#section-' + id + ' .card-title').text(response.data.name);
                        $('#section-' + id + ' .card-text').text(response.data.description);

                        // Tutup modal
                        $('#editModal').modal('hide');

                        // Tampilkan pesan sukses
                        alert(response.message);
                    } else {
                        // Tampilkan pesan error
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        });

        // DELETE
        $(document).on('click', '.delete-button', function() {
            var id = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: '<?= site_url('perizinan/delete/') ?>' + id,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            // Hapus elemen dari tampilan
                            $('#section-' + id).remove();

                            // Tampilkan pesan sukses
                            alert(response.message);
                        } else {
                            // Tampilkan pesan error
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                        alert('Terjadi kesalahan: ' + error);
                    }
                });
            }
        });
    });
</script>