<div class="perizinan-container">

    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="perizinan-breadcrumb mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= site_url() ?>">
                    <i class="fas fa-home me-1"></i>Beranda
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= site_url('perizinan') ?>">Perizinan</a>
            </li>
            <li class="breadcrumb-item active"><?= $section->name ?></li>
        </ol>
    </nav>

    <!-- Section Header -->
    <div class="perizinan-section-header card mb-4">
        <div class="card-body">
            <div class="d-flex flex-column flex-md-row align-items-md-center">
                <div class="section-icon-container me-md-4 mb-3 mb-md-0">
                    <i class="fas fa-folder-open"></i>
                </div>
                <div class="flex-grow-1">
                    <h2 class="section-title"><?= $section->name ?></h2>
                    <p class="section-description"><?= $section->description ?></p>
                    <div class="section-meta">
                        <span class="badge">
                            <i class="fas fa-layer-group me-1"></i>
                            <?= count($subsections) ?> Subkategori
                        </span>
                    </div>
                </div>
                <div class="section-actions mt-3 mt-md-0">
                    <button class="btn btn-help">
                        <i class="fas fa-question-circle me-1"></i>Bantuan
                    </button>
                </div>
            </div>
            <!-- Tombol Tambah Subsection -->
            <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#createSubsectionModal">
                <i class="fas fa-plus mr-2"></i>Tambah Subkategori
            </button>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="perizinan-tabs mb-4">
        <ul class="nav nav-tabs" role="tablist">
            <?php foreach ($subsections as $index => $subsection) : ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?= $index === 0 ? 'active' : '' ?>" id="tab-<?= $index ?>" data-bs-toggle="tab" data-bs-target="#content-<?= $index ?>" type="button" role="tab">
                        <div class="tab-content-wrapper">
                            <i class="fas fa-folder tab-icon"></i>
                            <span class="tab-text"><?= $subsection->name ?></span>
                            <span class="badge"><?= count($subsection->subsubsections) ?></span>
                        </div>
                    </button>
                    <!-- Tombol Edit & Delete Subsection -->
                    <button type="button" class="btn btn-sm btn-warning edit-subsection-button" data-id="<?= $subsection->id ?>" data-toggle="modal" data-target="#editSubsectionModal"><i class="fas fa-edit"></i> Edit</button>
                    <button type="button" class="btn btn-sm btn-danger delete-subsection-button" data-id="<?= $subsection->id ?>"><i class="fas fa-trash"></i> Delete</button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Tab Content -->
    <div class="tab-content perizinan-tab-content">
        <?php foreach ($subsections as $index => $subsection) : ?>
            <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" id="content-<?= $index ?>" role="tabpanel">

                <div class="row g-4">
                    <?php foreach ($subsection->subsubsections as $subsubsection) : ?>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="service-card card h-100">
                                <div class="card-body">
                                    <!-- Subsubsection Header -->
                                    <div class="service-header d-flex mb-3">
                                        <div class="service-icon-container">
                                            <i class="fas fa-folder"></i>
                                        </div>
                                        <div class="service-info">
                                            <h3 class="service-title"><?= $subsubsection->name ?></h3>
                                            <p class="service-count">
                                                <?= count($subsubsection->services) ?> Layanan Tersedia
                                            </p>
                                            <!-- Tombol Tambah Subsubsection -->
                                            <button type="button" class="btn btn-sm btn-success add-subsubsection-button" data-subsection-id="<?= $subsection->id ?>" data-toggle="modal" data-target="#createSubsubsectionModal">
                                                <i class="fas fa-plus"></i> Tambah Subsubsection
                                            </button>
                                            <!-- Tombol Edit & Delete Subsubsection -->
                                            <button type="button" class="btn btn-sm btn-warning edit-subsubsection-button" data-id="<?= $subsubsection->id ?>" data-toggle="modal" data-target="#editSubsubsectionModal"><i class="fas fa-edit"></i> Edit</button>
                                            <button type="button" class="btn btn-sm btn-danger delete-subsubsection-button" data-id="<?= $subsubsection->id ?>"><i class="fas fa-trash"></i> Delete</button>
                                        </div>
                                    </div>

                                    <!-- Services List -->
                                    <ul class="service-list">
                                        <?php foreach ($subsubsection->services as $service) : ?>
                                            <li class="service-item">
                                                <a href="<?= site_url('perizinan/apply_service/' . $service->id) ?>" class="service-link">
                                                    <div class="service-link-content">
                                                        <i class="fas fa-file-alt service-item-icon"></i>
                                                        <span class="service-name"><?= $service->name ?></span>
                                                        <i class="fas fa-chevron-right service-arrow"></i>
                                                    </div>
                                                </a>
                                                <!-- Tombol Edit & Delete Service -->
                                                <button type="button" class="btn btn-sm btn-warning edit-service-button" data-id="<?= $service->id ?>" data-toggle="modal" data-target="#editServiceModal"><i class="fas fa-edit"></i> Edit</button>
                                                <button type="button" class="btn btn-sm btn-danger delete-service-button" data-id="<?= $service->id ?>"><i class="fas fa-trash"></i> Delete</button>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <!-- Tombol Tambah Service -->
                                    <button type="button" class="btn btn-sm btn-success add-service-button" data-subsubsection-id="<?= $subsubsection->id ?>" data-toggle="modal" data-target="#createServiceModal">
                                        <i class="fas fa-plus"></i> Tambah Service
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal Tambah Subsection -->
<div class="modal fade" id="createSubsectionModal" tabindex="-1" role="dialog" aria-labelledby="createSubsectionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSubsectionModalLabel">Tambah Subkategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createSubsectionForm">
                    <div class="form-group">
                        <label for="subsectionName">Nama Subkategori:</label>
                        <input type="text" class="form-control" id="subsectionName" name="name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="saveSubsectionButton">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Subsection -->
<div class="modal fade" id="editSubsectionModal" tabindex="-1" role="dialog" aria-labelledby="editSubsectionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubsectionModalLabel">Edit Subkategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editSubsectionForm">
                    <input type="hidden" id="editSubsectionId" name="id">
                    <div class="form-group">
                        <label for="editSubsectionName">Nama Subkategori:</label>
                        <input type="text" class="form-control" id="editSubsectionName" name="name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="updateSubsectionButton">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Subsubsection -->
<div class="modal fade" id="createSubsubsectionModal" tabindex="-1" role="dialog" aria-labelledby="createSubsubsectionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSubsubsectionModalLabel">Tambah Subsubsection</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createSubsubsectionForm">
                    <div class="form-group">
                        <label for="subsubsectionName">Nama Subsubsection:</label>
                        <input type="text" class="form-control" id="subsubsectionName" name="name">
                    </div>
                    <input type="hidden" id="subsectionId" name="subsection_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="saveSubsubsectionButton">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Subsubsection -->
<div class="modal fade" id="editSubsubsectionModal" tabindex="-1" role="dialog" aria-labelledby="editSubsubsectionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubsubsectionModalLabel">Edit Subsubsection</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editSubsubsectionForm">
                    <input type="hidden" id="editSubsubsectionId" name="id">
                    <div class="form-group">
                        <label for="editSubsubsectionName">Nama Subsubsection:</label>
                        <input type="text" class="form-control" id="editSubsubsectionName" name="name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="updateSubsubsectionButton">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Service -->
<div class="modal fade" id="createServiceModal" tabindex="-1" role="dialog" aria-labelledby="createServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createServiceModalLabel">Tambah Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createServiceForm">
                    <div class="form-group">
                        <label for="serviceName">Nama Service:</label>
                        <input type="text" class="form-control" id="serviceName" name="name">
                    </div>
                    <input type="hidden" id="subsubsectionId" name="subsubsection_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="saveServiceButton">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Service -->
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editServiceForm">
                    <input type="hidden" id="editServiceId" name="id">
                    <div class="form-group">
                        <label for="editServiceName">Nama Service:</label>
                        <input type="text" class="form-control" id="editServiceName" name="name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="updateServiceButton">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .perizinan-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .perizinan-header {
        padding: 20px 0;
        border-bottom: 1px solid #eee;
    }

    .perizinan-logo {
        height: 60px;
        width: auto;
    }

    .perizinan-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.25rem;
    }

    .perizinan-subtitle {
        font-size: 1rem;
        color: #7f8c8d;
        margin-bottom: 0;
    }

    .perizinan-breadcrumb .breadcrumb {
        background-color: transparent;
        padding: 0.5rem 0;
    }

    .section-icon-container {
        background-color: rgba(13, 110, 253, 0.1);
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0d6efd;
        font-size: 1.5rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .section-description {
        color: #6c757d;
        margin-bottom: 0.75rem;
    }

    .perizinan-tabs .nav-tabs {
        border-bottom: 2px solid #dee2e6;
    }

    .perizinan-tabs .nav-link {
        border: none;
        color: #495057;
        padding: 0.75rem 1.25rem;
        transition: all 0.3s ease;
    }

    .perizinan-tabs .nav-link.active {
        color: #0d6efd;
        border-bottom: 3px solid #0d6efd;
        background-color: transparent;
        font-weight: 600;
    }

    .tab-content-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .tab-icon {
        font-size: 1.1rem;
    }

    .service-card {
        border-radius: 10px;
        border: 1px solid #e9ecef;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .service-icon-container {
        background-color: rgba(13, 110, 253, 0.1);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0d6efd;
        margin-right: 15px;
    }

    .service-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .service-count {
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 0;
    }

    .service-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .service-item {
        border-bottom: 1px solid #f1f1f1;
    }

    .service-item:last-child {
        border-bottom: none;
    }

    .service-link {
        display: block;
        padding: 10px 0;
        color: #495057;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .service-link:hover {
        color: #0d6efd;
    }

    .service-link-content {
        display: flex;
        align-items: center;
    }

    .service-item-icon {
        margin-right: 10px;
        color: #0d6efd;
        width: 20px;
        text-align: center;
    }

    .service-name {
        flex-grow: 1;
    }

    .service-arrow {
        color: #adb5bd;
        font-size: 0.8rem;
    }

    @media (max-width: 768px) {
        .perizinan-header {
            flex-direction: column;
            text-align: center;
        }

        .perizinan-logo {
            margin-bottom: 15px;
        }

        .section-icon-container {
            margin-bottom: 15px;
        }
    }
</style>

<!-- Bootstrap JS untuk tab functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // CREATE SUBSECTION
        $('#saveSubsectionButton').click(function() {
            var section_id = <?= $section->id ?>; // Ambil ID dari controller
            $.ajax({
                url: '<?= site_url('perizinan/create_subsection/') ?>' + section_id,
                type: 'POST',
                dataType: 'json',
                data: $('#createSubsectionForm').serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        // Lakukan sesuatu setelah berhasil ditambahkan, misalnya memperbarui tampilan
                        alert(response.message);
                        location.reload(); // Refresh halaman untuk memperbarui daftar subsections
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

        // READ (isi data ke modal edit subsection)
        $(document).on('click', '.edit-subsection-button', function() {
            var id = $(this).data('id');
            $('#editSubsectionId').val(id); // Set ID di form edit
            var subsectionName = $(this).closest('.nav-item').find('.tab-text').text(); // Ambil nama dari tab
            $('#editSubsectionName').val(subsectionName); // Isi nama di form edit
            $('#editSubsectionModal').modal('show'); // Tampilkan modal
        });

        // UPDATE SUBSECTION
        $('#updateSubsectionButton').click(function() {
            var id = $('#editSubsectionId').val();
            $.ajax({
                url: '<?= site_url('perizinan/update_subsection/') ?>' + id,
                type: 'POST',
                dataType: 'json',
                data: $('#editSubsectionForm').serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload(); // Refresh halaman untuk memperbarui daftar subsections
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

        // DELETE SUBSECTION
        $(document).on('click', '.delete-subsection-button', function() {
            var id = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus subkategori ini?')) {
                $.ajax({
                    url: '<?= site_url('perizinan/delete_subsection/') ?>' + id,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload(); // Refresh halaman untuk memperbarui daftar subsections
                        } else {
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

        // CREATE SUBSUBSECTION
        $(document).on('click', '.add-subsubsection-button', function() {
            var subsectionId = $(this).data('subsection-id');
            $('#subsectionId').val(subsectionId); // Set subsection_id di form
            $('#createSubsubsectionModal').modal('show'); // Tampilkan modal
        });

        $('#saveSubsubsectionButton').click(function() {
            var subsection_id = $('#subsectionId').val();
            $.ajax({
                url: '<?= site_url('perizinan/create_subsubsection/') ?>' + subsection_id,
                type: 'POST',
                dataType: 'json',
                data: $('#createSubsubsectionForm').serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
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

        //READ (isi data ke modal edit subsubsection)
        $(document).on('click', '.edit-subsubsection-button', function() {
            var id = $(this).data('id');
            $('#editSubsubsectionId').val(id); // Set ID di form edit
            var subsubsectionName = $(this).closest('.service-info').find('.service-title').text(); // Ambil nama dari card
            $('#editSubsubsectionName').val(subsubsectionName); // Isi nama di form edit
            $('#editSubsubsectionModal').modal('show'); // Tampilkan modal
        });

        // UPDATE SUBSUBSECTION
        $('#updateSubsubsectionButton').click(function() {
            var id = $('#editSubsubsectionId').val();
            $.ajax({
                url: '<?= site_url('perizinan/update_subsubsection/') ?>' + id,
                type: 'POST',
                dataType: 'json',
                data: $('#editSubsubsectionForm').serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
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

        // DELETE SUBSUBSECTION
        $(document).on('click', '.delete-subsubsection-button', function() {
            var id = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus subsubsection ini?')) {
                $.ajax({
                    url: '<?= site_url('perizinan/delete_subsubsection/') ?>' + id,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload();
                        } else {
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

        // CREATE SERVICE
        $(document).on('click', '.add-service-button', function() {
            var subsubsectionId = $(this).data('subsubsection-id');
            $('#subsubsectionId').val(subsubsectionId); // Set subsubsection_id di form
            $('#createServiceModal').modal('show'); // Tampilkan modal
        });

        $('#saveServiceButton').click(function() {
            var subsubsection_id = $('#subsubsectionId').val();
            $.ajax({
                url: '<?= site_url('perizinan/create_service/') ?>' + subsubsection_id,
                type: 'POST',
                dataType: 'json',
                data: $('#createServiceForm').serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
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

        //READ (isi data ke modal edit service)
        $(document).on('click', '.edit-service-button', function() {
            var id = $(this).data('id');
            $('#editServiceId').val(id); // Set ID di form edit
            var serviceName = $(this).closest('.service-item').find('.service-name').text(); // Ambil nama dari list item
            $('#editServiceName').val(serviceName); // Isi nama di form edit
            $('#editServiceModal').modal('show'); // Tampilkan modal
        });

        // UPDATE SERVICE
        $('#updateServiceButton').click(function() {
            var id = $('#editServiceId').val();
            $.ajax({
                url: '<?= site_url('perizinan/update_service/') ?>' + id,
                type: 'POST',
                dataType: 'json',
                data: $('#editServiceForm').serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
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

        // DELETE SERVICE
        $(document).on('click', '.delete-service-button', function() {
            var id = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus service ini?')) {
                $.ajax({
                    url: '<?= site_url('perizinan/delete_service/') ?>' + id,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload();
                        } else {
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