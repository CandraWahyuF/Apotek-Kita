<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="x_content">

            <form action="" method="post" class="form-horizontal form-label-left" novalidate>

                <div class="row justify-content-center pt-4" post>
                    <div class="col-2">
                        <label for="id" class="col-form-label">Nama Obat</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="nama_obat" name="nama_obat" class="form-control"
                            value="<?= $obat['nama_obat']; ?>">
                        <?= form_error('nama_obat', '<small class="text-danger pl-3">' ,'</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="penyimpanan" class="col-form-label">Penyimpanan</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="penyimpanan" name="penyimpanan" class="form-control"
                            value="<?= $obat['penyimpanan']; ?>">
                        <?= form_error('penyimpanan', '<small class="text-danger pl-3">' ,'</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="stok" class="col-form-label">Banyak Stok</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="stok" name="stok" class="form-control" value="<?= $obat['stok']; ?>">
                        <?= form_error('stok', '<small class="text-danger pl-3">' ,'</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="nama_kategori" class="col-form-label">Nama Kategori</label>
                    </div>
                    <div class="col-3">
                        <select type="text" name="nama_kat" id="nama_kat" class="form-control"
                            value="<?= $obat['nama_kat']; ?>">
                            <?php foreach($get_kat as $gk){ ?>
                            <option value="<?php echo $gk; ?>"><?php echo $gk; ?></option>
                            <?php  }?>
                        </select>
                        <?= form_error('nama_kat', '<small class="text-danger pl-3">' ,'</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="kedaluwarsa" class="col-form-label">Tanggal Kadaluarsa</label>
                    </div>
                    <div class="col-3">
                        <input type="date" id="kedaluwarsa" name="kedaluwarsa" class="form-control"
                            value="<?= $obat['kedaluwarsa']; ?>">
                        <?= form_error('kedaluwarsa', '<small class="text-danger pl-3">' ,'</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="h_beli" class="col-form-label">Harga Beli</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="h_beli" name="h_beli" class="form-control"
                            value="<?= $obat['h_beli']; ?>">
                        <?= form_error('h_beli', '<small class="text-danger pl-3">' ,'</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="h_jual" class="col-form-label">Harga Jual</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="h_jual" name="h_jual" class="form-control"
                            value="<?= $obat['h_jual']; ?>">
                        <?= form_error('h_jual', '<small class="text-danger pl-3">' ,'</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="nama_pemasok" class="col-form-label">Nama Pemasok</label>
                    </div>
                    <div class="col-3">
                        <select type="text" name="nama_pemasok" id="nama_pemasok" class="form-control"
                            value="<?= $obat['nama_pemasok']; ?>">
                            <?php foreach($get_pemasok as $gs){ ?>
                            <option value="<?php echo $gs; ?>"><?php echo $gs; ?></option>
                            <?php  }?>
                        </select>
                        <?= form_error('nama_pemasok', '<small class="text-danger pl-3">' ,'</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-4 pb-4">
                    <div class="col-1">
                        <a href="<?= base_url('user/lihat_obat')?>"><button type="button" class="btn btn-danger"
                                name="batal" id="batal">Batal</button></a>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-success" name="submit" id="submit">Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>