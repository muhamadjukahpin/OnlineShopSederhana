    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div class="row mt-3">
            <div class="col-md-6">
                <?= $this->session->flashdata('message'); ?>
            </div>
         </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <form action="<?=  base_url('user/changepassword'); ?>" method="post">
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control">
                        <small class="form-text text-danger"><?= form_error('current_password'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="new_password1">New Password</label>
                        <input type="password" name="new_password1" id="new_password1" class="form-control">
                        <small class="form-text text-danger"><?= form_error('new_password1'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="new_password2">Repeat Password</label>
                        <input type="password" name="new_password2" id="new_password2" class="form-control">
                        <small class="form-text text-danger"><?= form_error('new_password2'); ?></small>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->