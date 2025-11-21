<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1 class="mb-3">Template Dokumen Hukum</h1>
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">Pilih kategori dokumen yang Anda butuhkan</p>
                <button class="btn btn-primary" id="addCategoryBtn">
                    <i class="fas fa-plus"></i> Tambah Kategori
                </button>
            </div>
        </div>
    </div>

    <!-- Tampilan mirip Justika -->
    <div class="row">
        <?php foreach ($categories as $category_id => $category): ?>
            <div class="col-md-12 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>
                        <i class="<?= $category['icon'] ?> mr-2"></i>
                        <?= $category['name'] ?>
                    </h3>
                    <div>
                        <button class="btn btn-sm btn-outline-primary edit-category" data-id="<?= $category_id ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger delete-category" data-id="<?= $category_id ?>">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button class="btn btn-sm btn-success add-subcategory" data-category-id="<?= $category_id ?>">
                            <i class="fas fa-plus"></i> Subkategori
                        </button>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($category['subcategories'] as $subcategory): ?>
                        <div class="col-md-3 mb-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="<?= site_url('legal-docs/' . $subcategory['slug']) ?>" class="text-dark">
                                            <?= $subcategory['name'] ?>
                                        </a>
                                    </h5>
                                    <p class="card-text text-muted small">
                                        <?= count($subcategory['documents'] ?? 0) ?> dokumen tersedia
                                    </p>
                                </div>
                                <div class="card-footer bg-white d-flex justify-content-between">
                                    <a href="<?= site_url('legal-docs/' . $subcategory['slug']) ?>" class="btn btn-sm btn-outline-primary">
                                        Lihat Dokumen
                                    </a>
                                    <div>
                                        <button class="btn btn-sm btn-outline-secondary edit-subcategory" data-id="<?= $subcategory['id'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger delete-subcategory" data-id="<?= $subcategory['id'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal untuk Kategori -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCategoryTitle">Tambah Kategori Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="categoryForm">
                <div class="modal-body">
                    <input type="hidden" name="action" id="action" value="add_category">
                    <input type="hidden" name="id" id="categoryId" value="">
                    <div class="form-group">
                        <label for="categoryName">Nama Kategori</label>
                        <input type="text" class="form-control" id="categoryName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryIcon">Icon (Font Awesome)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i id="iconPreview"></i></span>
                            </div>
                            <input type="text" class="form-control" id="categoryIcon" name="icon" placeholder="fas fa-briefcase" required>
                        </div>
                        <small class="form-text text-muted">Contoh: fas fa-briefcase, fas fa-file-contract</small>
                    </div>
                    <div class="form-group">
                        <label for="sortOrder">Urutan Tampilan</label>
                        <input type="number" class="form-control" id="sortOrder" name="sort_order" value="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk Subkategori -->
<div class="modal fade" id="subcategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSubcategoryTitle">Tambah Subkategori Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="subcategoryForm">
                <div class="modal-body">
                    <input type="hidden" name="action" id="subcategoryAction" value="add_subcategory">
                    <input type="hidden" name="id" id="subcategoryId" value="">
                    <input type="hidden" name="category_id" id="parentCategoryId" value="">
                    <div class="form-group">
                        <label for="subcategoryName">Nama Subkategori</label>
                        <input type="text" class="form-control" id="subcategoryName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="subcategorySortOrder">Urutan Tampilan</label>
                        <input type="number" class="form-control" id="subcategorySortOrder" name="sort_order" value="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>