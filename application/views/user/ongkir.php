<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-5">

            <div class="input-group">
                <div class="input-group-append">
                    <span class="input-group-text">Berat</span>
                </div>
                <input type="number" value="1" min="1" class="form-control" id="berat" name="berat">
                <div class="input-group-append">
                    <span class="input-group-text">Kg</span>
                </div>
            </div>

            <div class="form-group">

            </div>

            <p>Lokasi Asal :</p>
            <div class="form-group">
                <select class="form-control" id="sel1">
                    <option value=""> Pilih Provinsi</option>
                </select>
            </div>

            <div class="form-group">
                <select class="form-control" id="sel2" disabled>
                    <option value=""> Pilih Kota</option>
                </select>
            </div>

            <p>Lokasi Tujuan :</p>


            <div class="form-group">
                <select class="form-control" id="sel11">
                    <option value=""> Pilih Provinsi</option>
                </select>
            </div>

            <div class="form-group">
                <select class="form-control" id="sel22" disabled>
                    <option value=""> Pilih Kota</option>
                </select>
            </div>

            <div class="form-group">
                <select class="form-control" id="kurir" disabled>
                    <option value=""> Pilih Kurir</option>
                    <option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                    <option value="pos">POS Indonesia</option>
                </select>
            </div>

            <div id="hasil"></div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->