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
            <a href="#" class="btn btn-primary showNewSubmenuModal" data-toggle="modal" data-target="#addNewSubmenuModal">Add New Submenu</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md overflow-auto">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Title</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Is Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    foreach ($submenu_management as $submenu) : ?>
                        <tr>
                            <th scope="row"><?= ++$i; ?></th>
                            <td><?= $submenu['menu']; ?></td>
                            <td><?= $submenu['title']; ?></td>
                            <td><?= $submenu['url']; ?></td>
                            <td><?= $submenu['icon']; ?></td>
                            <td><?= $submenu['is_active']; ?></td>
                            <td>
                                <a href="#" class="badge badge-success showEditSubmenu" data-toggle="modal" data-target="#addNewSubmenuModal" data-id="<?= $submenu['id']; ?>">Edit</a>
                                <a href="<?= base_url('menu/delSubmenu'); ?>/<?= $submenu['id']; ?>" class="badge badge-danger " onclick="return confirm('are you sure?')">Delete</a>
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
<div class="modal fade" id="addNewSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="addNewSubmenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewSubmenuLabel">Add New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu/addSubmenu'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <select class="custom-select" id="menu_id" name="menu_id">
                            <option value="">select menu</option>
                            <?php foreach ($menu_management as $m) : ?>
                                <option value="<?= $m['menu_id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" id="url" name="url" required>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="is_active" value="1" id="is_active" checked="checked">
                            <label class="custom-control-label" for="is_active">Is Active ?</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Add Submenu</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->