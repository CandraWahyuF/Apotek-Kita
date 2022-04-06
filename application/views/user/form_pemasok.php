<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="x_content">

            <form action="<?= base_url('user/tambah_pemasok')?>" method="post" class="form-horizontal form-label-left"
                novalidate>

                <div class="row justify-content-center pt-4" post>
                    <div class="col-2">
                        <label for="nama_pemasok" class="col-form-label">Nama Pemasok</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="nama_pemasok" name="nama_pemasok" class="form-control" required>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="alamat" class="col-form-label">Alamat</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="alamat" name="alamat" class="form-control" required>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="telepon" class="col-form-label">Nomor Telepon</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="telepon" name="telepon" class="form-control" required>
                    </div>
                </div>

                <div class="row justify-content-center pt-4 pb-4">
                    <div class="col-1">
                        <a href="<?= base_url('user/lihat_pemasok')?>"><button type="button" class="btn btn-danger"
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