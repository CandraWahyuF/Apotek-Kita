<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="x_content">

            <form action="<?php echo base_url('user/tambah_obat'); ?>" method="post"
                class="form-horizontal form-label-left" novalidate>

                <div class="row justify-content-center pt-4" post>
                    <div class="col-2">
                        <label for="nama_obat" class="col-form-label">Nama Obat</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="nama_obat" name="nama_obat" class="form-control" required>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="penyimpanan" class="col-form-label">Penyimpanan</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="penyimpanan" name="penyimpanan" class="form-control" required>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="stok" class="col-form-label">Banyak Stok</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="stok" name="stok" class="form-control" required
                            data-validate-minmax="0,1000">
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="kategori" class="col-form-label">Kategori</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="kategori" name="kategori" class="form-control" required>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="kedaluwarsa" class="col-form-label">Tanggal Kedaluwarsa</label>
                    </div>
                    <div class="col-3">
                        <input type="date" id="kedaluwarsa" name="kedaluwarsa" class="form-control" required>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="harga_beli" class="col-form-label">Harga Beli (Rp)</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="harga_beli" name="harga_beli" class="form-control" required
                            data-validate-minmax="10,1000000">
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="harga_jual" class="col-form-label">Harga Jual (Rp)</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="harga_jual" name="harga_jual" class="form-control" required
                            data-validate-minmax="10,1000000">
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="nama_pemasok" class="col-form-label">Nama Pemasok</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="nama_pemasok" name="nama_pemasok" class="form-control" required>
                    </div>
                </div>

                <div class="row justify-content-center pt-4 pb-4">
                    <div class="col-1">
                        <a href="<?php echo base_url('user/lihat_obat'); ?>"><button type="button"
                                class="btn btn-danger" name="batal" id="batal">Batal</button></a>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-success" name="submit" id="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>