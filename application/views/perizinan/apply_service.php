<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Notifikasi -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?= $this->session->flashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        <i class="fas fa-edit me-2"></i><?= $service->name ?>
                    </h3>
                    <div>
                        <button class="btn btn-sm btn-light toggle-preview" data-mode="editor">
                            <i class="fas fa-eye me-1"></i> Mode Preview
                        </button>
                    </div>
                </div>

                <!-- Editor Section -->
                <div class="card-body editor-section" style="<?= $preview_mode ? 'display:none;' : '' ?>">
                    <form id="description-form" action="<?= site_url('perizinan/save_service_description/' . $service->id) ?>" method="post">
                        <div class="mb-3">
                            <textarea id="editor" name="description"><?=
                                                                        $this->session->flashdata('saved_description') ?
                                                                            html_escape($this->session->flashdata('saved_description')) :
                                                                            html_escape($service->description)
                                                                        ?></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="<?= site_url('perizinan/'. $id_kembali) ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Preview Section -->
                <div class="card-body preview-section" style="<?= $preview_mode ? '' : 'display:none;' ?>">
                    <div class="d-flex justify-content-between mb-3">
                        <h4><i class="fas fa-eye me-2"></i>Preview Deskripsi</h4>
                        <button class="btn btn-sm btn-primary toggle-preview" data-mode="preview">
                            <i class="fas fa-edit me-1"></i> Kembali ke Editor
                        </button>
                    </div>
                    <div class="border p-3 bg-light rounded">
                        <?=
                        $this->session->flashdata('saved_description') ?
                            html_entity_decode($this->session->flashdata('saved_description')) : ($service->description ? html_entity_decode($service->description) : '<p class="text-muted">Belum ada deskripsi</p>')
                        ?>
                    </div>
                    <div class="mt-3">
                        <a href="<?= site_url('perizinan/') ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load CKEditor dari CDN -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    // Inisialisasi CKEditor
    document.addEventListener('DOMContentLoaded', function() {
        // Cek apakah CKEditor berhasil dimuat
        if (typeof CKEDITOR === 'undefined') {
            console.error('CKEditor tidak terload!');
            return;
        }

        // Inisialisasi editor
        var editor = CKEDITOR.replace('editor', {
            filebrowserUploadUrl: '<?= site_url("perizinan/upload_image") ?>',
            filebrowserUploadMethod: 'form',
            height: 400,
            toolbar: [{
                    name: 'document',
                    items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print']
                },
                {
                    name: 'clipboard',
                    items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink', 'Anchor']
                },
                {
                    name: 'insert',
                    items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar']
                },
                '/',
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'tools',
                    items: ['Maximize', 'ShowBlocks']
                }
            ]
        });

        // Debug inisialisasi
        editor.on('instanceReady', function() {
            console.log('CKEditor siap digunakan');
        });

        // Toggle preview/editor
        document.querySelectorAll('.toggle-preview').forEach(button => {
            button.addEventListener('click', function() {
                const mode = this.getAttribute('data-mode');

                if (mode === 'editor') {
                    document.querySelector('.editor-section').style.display = 'none';
                    document.querySelector('.preview-section').style.display = 'block';
                    this.setAttribute('data-mode', 'preview');
                    this.innerHTML = '<i class="fas fa-edit me-1"></i> Kembali ke Editor';
                } else {
                    document.querySelector('.editor-section').style.display = 'block';
                    document.querySelector('.preview-section').style.display = 'none';
                    this.setAttribute('data-mode', 'editor');
                    this.innerHTML = '<i class="fas fa-eye me-1"></i> Mode Preview';
                }
            });
        });

        // Update preview saat form disubmit
        document.getElementById('description-form')?.addEventListener('submit', function() {
            for (var instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        });
    });
</script>

<style>
    /* Gaya khusus untuk konten preview */
    .preview-section img {
        max-width: 100%;
        height: auto;
    }

    .preview-section table {
        width: 100%;
        border-collapse: collapse;
        margin: 1rem 0;
    }

    .preview-section table,
    .preview-section th,
    .preview-section td {
        border: 1px solid #dee2e6;
    }

    .preview-section th,
    .pview-section td {
        padding: 0.75rem;
    }

    /* Responsif untuk mobile */
    @media (max-width: 768px) {
        .card-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .toggle-preview {
            margin-top: 10px;
        }
    }
</style>