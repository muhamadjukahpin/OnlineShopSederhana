<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row mb-2">
        <div class="col-md-5">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <a href="<?= base_url('member/addItem'); ?>" class="btn btn-primary">Add Item</a>
        </div>
    </div>
    <div class="row mt-3">
        <?php foreach ($item as $i) : ?>
            <div class="col-lg-3 mt-2">
                <div class="card" style="width: 13rem;">
                    <img src="<?= base_url('asset/img/') . $i['image']; ?>" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title"><?= ucwords($i['name_item']); ?></h5>
                        <h6 class="card-title">Rp.<?= number_format($i['price'], 2, ',', '.'); ?></h6>
                        <a href="#" class="card-link showDes" data-id="<?= $i['id']; ?>">
                            <p class="card-text  text-success" data-toggle="modal" data-target="#desModal">Description</p>
                        </a>
                        <div class="row mt-1">
                            <div class="col-5">
                                <a href="<?= base_url('member/delItem/') . $i['id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">delete</a>
                            </div>
                            <div class="col-5 ml-3">
                                <a href="<?= base_url('member/editItem/') . $i['id']; ?>" class="btn btn-success">edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="desModal" tabindex="-1" role="dialog" aria-labelledby="desLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="desLabel">Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <p class="ml-1 description"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>