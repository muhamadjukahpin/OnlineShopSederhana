<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-md-5">
            <?php echo form_open_multipart('user/edit'); ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?= $user['email']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $user['name']; ?>">
                <small class="form-text text-danger"><?= form_error('name'); ?></small>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="gender">Gender</label>
                        <select class="form-control form-control-sm" name="gender" id="gender">
                            <option value="<?= $user['gender']; ?>">male</option>
                            <option value="<?= $user['gender']; ?>">female</option>
                        </select>
                        <?= form_error('gender', '<small class="text-danger ">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <label for="image">Image</label>
            <div class="row">
                <div class="col-md-4">
                    <img class="img-thumbnail" src="<?= base_url('asset/img/') . $user['image']; ?>" alt="profile">
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input">
                            <label for="image" class="custom-file-label">Choose file</label>
                        </div>
                        <small class="form-text text-danger"><?= $this->session->flashdata('message'); ?></small>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" name="submit" class="btn btn-primary float-right">Edit Profile</button>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->