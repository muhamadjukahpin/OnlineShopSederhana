<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Registration Account</h1>
                                </div>

                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" action="<?= base_url('auth/registration'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control form-control-user" value="<?= set_value('name'); ?>" id="name" placeholder="Full Name">
                                        <?= form_error('name', '<small class="text-danger ">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control form-control-user" value="<?= set_value('email'); ?>" id="email" placeholder="Email Address">
                                        <?= form_error('email', '<small class="text-danger ">', '</small>'); ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Password">
                                            <?= form_error('password1', '<small class="text-danger ">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="password2" class="form-control form-control-user" id="password2" placeholder="Repeat Password">
                                            <?= form_error('password2', '<small class="text-danger ">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm" name="gender" id="gender">
                                                    <option>Gender</option>
                                                    <option value="male">male</option>
                                                    <option value="female">female</option>
                                                </select>
                                                <?= form_error('gender', '<small class="text-danger ">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>