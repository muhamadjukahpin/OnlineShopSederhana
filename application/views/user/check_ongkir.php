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
        <div class="col-md-5">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name_item">Name Item</label>
                    <input type="text" name="name_item" id="name_item" value="<?= $item['name_item']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="weight_item">Weight</label>
                    <div class="row">
                        <div class="col-md-5">
                            <input type="number" value="<?= $item['weight_item']; ?>" class="form-control" id="weight_item" name="weight_item" readonly>
                        </div>
                        <div class="col-md-3">
                            <span class="input-group-text">gram</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="from_city">From City</label>
                    <input type="hidden" name="origin" id="origin" value="<?= $item['id_city']; ?>">
                    <input type="text" name="from_city" id="from_city" value="<?= $item['city']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="to_city">To City</label>
                    <input type="hidden" name="des" id="des" value="<?= $address['id_city']; ?>">
                    <input type="text" name="to_city" id="to_city" value="<?= $address['city_name'] ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="courier">Courier</label>
                    <select class="custom-select" id="courier" name="courier" required>
                        <option value="jne">JNE</option>
                        <option value="tiki">TIKI</option>
                        <option value="pos">POS INDONESIA</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <a href="<?= base_url('user/shop'); ?>" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <div class="col-md-3 ml-auto">
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Check</button>
                        </div>
                    </div>
                </div>
        </div>
        <?php if (isset($_POST['submit'])) : ?>
            <div class="col-md-7">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Service</th>
                            <th scope="col">Price</th>
                            <th scope="col">Choose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ongkir as $ong) : ?>
                            <?php foreach ($ong['results'] as $o) : ?>
                                <?php $name = $o['name']; ?>
                                <?php foreach ($o['costs'] as $c) : ?>
                                    <?php $service[] = $c['service']; ?>
                                    <?php foreach ($c['cost'] as $cost) : ?>
                                        <?php $value[] = $cost['value'] ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>

                        <?php for ($i = 0; $i < count($service); $i++) : ?>
                            <tr>
                                <td><?= $i + 1; ?></td>
                                <td><?= $name; ?></td>
                                <td><?= $service[$i]; ?></td>
                                <td><?= $value[$i]; ?></td>
                                <td>
                                    <input type="radio" name="kurir" id="kurir" value="<?= $name . ' ' . $service[$i] . ' ' . $value[$i]; ?>">
                                </td>
                            </tr>
                        <?php endfor; ?>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="btn btn-primary">Checkout</a>
            </div>
            </form>
        <?php endif; ?>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->