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
            <h5>Role : <?= $role['role']; ?></h5>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-5">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Access</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    foreach ($menu as $m) : ?>
                        <tr>
                            <?php if ($m['menu'] == 'Admin') : ?>
                                <th colspan="2" class="text-center">Access Blocked</th>
                            <?php else : ?>
                                <th scope="row"><?= ++$i; ?></th>
                                <td><?= $m['menu'] ?></td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" <?= check_access($role['role_id'], $m['menu_id']); ?> data-menu="<?= $m['menu_id']; ?>" data-role="<?= $role['role_id']; ?>">
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="row pb-0 mt-3">
                <div class="col-md-1 pb-0">
                    <a href="<?= base_url('admin/role'); ?>" class="btn btn-primary ">Back</a>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>

<!-- End of Main Content -->