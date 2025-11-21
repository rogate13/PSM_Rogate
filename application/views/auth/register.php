<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-user-plus mr-2"></i>Register</h4>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('register_failed')) : ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('register_failed'); ?></div>
                <?php endif; ?>

                <form action="<?php echo site_url('register'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid' : ''; ?>" name="nama" id="nama" value="<?php echo set_value('nama'); ?>">
                        <div class="invalid-feedback"><?php echo form_error('nama'); ?></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?php echo set_value('email'); ?>">
                        <div class="invalid-feedback"><?php echo form_error('email'); ?></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" name="password" id="password">
                        <div class="invalid-feedback"><?php echo form_error('password'); ?></div>
                    </div>
                    <div class="form-group">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" class="form-control <?php echo form_error('password2') ? 'is-invalid' : ''; ?>" name="password2" id="password2">
                        <div class="invalid-feedback"><?php echo form_error('password2'); ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                </form>
                <div class="text-center mt-3">
                    Sudah punya akun? <a href="<?php echo site_url('login'); ?>">Login disini</a>
                </div>
            </div>
        </div>
    </div>
</div>
