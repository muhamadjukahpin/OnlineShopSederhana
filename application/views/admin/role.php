<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-5">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col md-5">
            <a href="#" class="btn btn-primary showNewRoleModal" data-toggle="modal" data-target="#addNewRoleModal">Add New Role</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-5">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role_id</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    foreach ($role as $r) : ?>
                        <tr>
                            <th scope="row"><?= ++$i; ?></th>
                            <th scope="row"><?= $r['role_id']; ?></th>
                            <td><?= $r['role']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/roleAccess'); ?>/<?= $r['id']; ?>" class="badge badge-primary">Access</a>
                                <a href="#" class="badge badge-success showEditRole" data-toggle="modal" data-target="#addNewRoleModal" data-id="<?= $r['id']; ?>">Edit</a>
                                <a href="<?= base_url('admin/delRole'); ?>/<?= $r['id']; ?>" class="badge badge-danger " onclick="return confirm('are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>

<!-- Modal -->
<div class="modal fade" id="addNewRoleModal" tabindex="-1" role="dialog" aria-labelledby="addNewRoleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewRoleLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/addRole'); ?>" method="post">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="role_id">Role id</label>
                        <input type="number" class="form-control" id="role_id" name="role_id" placeholder="Enter role id" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Enter role" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Add Role</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->