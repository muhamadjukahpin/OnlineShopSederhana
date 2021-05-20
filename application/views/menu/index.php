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
            <a href="#" class="btn btn-primary showNewMenuModal" data-toggle="modal" data-target="#addNewMenuModal">Add New Menu</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-5">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu_id</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    foreach ($menu_management as $menu) : ?>
                        <tr>
                            <th scope="row"><?= ++$i; ?></th>
                            <th scope="row"><?= $menu['menu_id']; ?></th>
                            <td><?= $menu['menu']; ?></td>
                            <td>
                                <a href="#" class="badge badge-success showEditMenu" data-toggle="modal" data-target="#addNewMenuModal" data-id="<?= $menu['id']; ?>">Edit</a>
                                <a href="<?= base_url('menu/delMenu'); ?>/<?= $menu['id']; ?>" class="badge badge-danger " onclick="return confirm('are you sure?')">Delete</a>
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
<div class="modal fade" id="addNewMenuModal" tabindex="-1" role="dialog" aria-labelledby="addNewMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewMenuLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu/addMenu'); ?>" method="post">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="menu_id">Menu Id</label>
                        <input type="number" class="form-control" id="menu_id" name="menu_id" placeholder="Enter Menu Id" required>
                    </div>
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Enter Menu" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Add Menu</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->