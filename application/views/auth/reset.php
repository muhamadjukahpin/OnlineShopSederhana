<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" action="<?= base_url('auth/resetpassword'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password2" class="form-control form-control-user" id="password2" placeholder="Password">
                                        <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                        Reset Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>