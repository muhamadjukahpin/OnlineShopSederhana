<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-5">
            <form action="<?= base_url('user/'); ?>" method="post">
                <div class="form-group">
                    <label for="name_item">Name Item</label>
                    <input type="text" name="name_item" id="name_item" value="<?= $item['name_item']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="from_city">From City</label>
                    <input type="text" name="from_city" id="from_city" value="<?= $item['name'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="to_city">To City</label>
                    <input type="text" name="to_city" id="to_city" value="<?= $address['city_name'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="courier">Courier</label>
                    <select class="custom-select" id="courier" name="courier" required>
                        <option>....Choose Courier....</option>
                        <option value="JNE">JNE</option>
                        <option value="NINJA EXPRESS">NINJA EXPRESS</option>
                        <option value="TIKI">TIKI</option>
                        <option value="SI CEPAT">SI CEPAT</option>
                        <option value="J&T EXPRESS">J&T EXPRESS</option>
                    </select>
                </div>
                <?php var_dump($cost); ?>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Checkout</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->