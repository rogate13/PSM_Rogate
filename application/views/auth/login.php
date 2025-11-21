<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-sign-in-alt mr-2"></i>Login</h4>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('login_failed')) : ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('login_failed'); ?></div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('register_success')) : ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('register_success'); ?></div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('user_loggedout')) : ?>
                    <div class="alert alert-info"><?php echo $this->session->flashdata('user_loggedout'); ?></div>
                <?php endif; ?>

                <form action="<?php echo site_url('login'); ?>" method="post">
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
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <div class="text-center mt-3">
                    Belum punya akun? <a href="<?php echo site_url('register'); ?>">Daftar disini</a>
                </div>
            </div>
        </div>
    </div>
</div>