<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php foreach ($message as $m) : ?>
        <div class="row mt-2">
            <div class="col-md-1">
                <img src="<?= base_url('asset/img/') . $m['image_sender']; ?>" class="rounded-circle" width="60" height="60" alt="profile">
            </div>
            <div class="col-md-3">
                <span class="font-weight-bold text-capitalize"><?= $m['name_sender']; ?></span>
                <a href="<?= base_url('user/chat'); ?>" class="text-dark text-decoration-none">
                    <div class="text-truncate"><?= $m['message']; ?></div>
                </a>
            </div>
            <div class="col-md-1">
                <a href="<?= base_url('user/chat'); ?>" class="badge badge-primary">Detail</a>
                <a href="<?= base_url('user/deletemessage'); ?>" class="badge badge-danger">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->