<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title1; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="alert alert-danger" role="alert">
                    List Obat dengan Sisa Stok <strong>Kurang dari 10</strong>!
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Penyimpanan</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Pemasok</th>
                            <th>Kedaluwarsa</th>
                            <th>Harga Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; 
                        foreach ($almstok as $data) : 
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data->nama_obat; ?></td>
                            <td><?= $data->penyimpanan; ?></td>
                            <td><?= $data->nama_kat; ?></td>
                            <td><?= $data->stok; ?></td>
                            <td><?= $data->nama_pemasok; ?></td>
                            <td><?= date('j F Y',strtotime($data->kedaluwarsa)); ?></td>
                            <td><?= $data->h_jual; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title2; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Penyimpanan</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Pemasok</th>
                            <th>Kedaluwarsa</th>
                            <th>Harga Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; 
                        foreach ($habis_stok as $data) : 
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data->nama_obat; ?></td>
                            <td><?= $data->penyimpanan; ?></td>
                            <td><?= $data->nama_kategori; ?></td>
                            <td><?= $data->stok; ?></td>
                            <td><?= $data->nama_pemasok; ?></td>
                            <td><?= date('j F Y',strtotime($data->kedaluwarsa)); ?></td>
                            <td><?= $data->h_jual; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>