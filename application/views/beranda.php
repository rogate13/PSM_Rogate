<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm transition-all">
            <div class="card-body text-center p-4">
                <div class="icon-wrapper mb-3">
                    <i class="fas fa-file-signature fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">Perizinan</h5>
                <p class="card-text text-muted">Layanan konsultasi perizinan usaha dan legalitas</p>
                <a href="<?php echo site_url('perizinan'); ?>" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-right mr-2"></i> Akses
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm transition-all">
            <div class="card-body text-center p-4">
                <div class="icon-wrapper mb-3">
                    <i class="fas fa-file-contract fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">Legal Docs</h5>
                <p class="card-text text-muted">Pembuatan dan review dokumen hukum</p>
                <a href="<?php echo site_url('legal-docs'); ?>" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-right mr-2"></i> Akses
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm transition-all">
            <div class="card-body text-center p-4">
                <div class="icon-wrapper mb-3">
                    <i class="fas fa-database fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">DB Hukum</h5>
                <p class="card-text text-muted">Database peraturan dan undang-undang</p>
                <a href="<?php echo site_url('db-hukum'); ?>" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-right mr-2"></i> Akses
                </a>
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

    .icon-wrapper {
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-title {
        font-weight: 600;
    }

    .btn-outline-primary {
        border-width: 2px;
        font-weight: 500;
    }
</style>