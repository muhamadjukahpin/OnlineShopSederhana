<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-5">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col overflow-auto">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?= ++$i; ?></th>
                            <td><?= $user['name']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td>
                                <a href="#" class="badge badge-success editRole" data-toggle="modal" data-target="#editRoleModal" data-id="<?= $user['id']; ?>">Edit Role</a>
                                <a href="<?= base_url('admin/deluser/') . $user['id']; ?>" onclick="return confirm('are you sure?')" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <a href="<?= base_url('admin'); ?>" class="btn btn-primary">Back</a>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoleLabel">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/editUserRole'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <select class="custom-select" id="role_id" name="role_id">
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r['role_id']; ?>"><?= $r['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Edit Role</button>
                </form>
            </div>
        </div>
    </div>
</div>