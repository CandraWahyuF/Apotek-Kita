<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Pembelian</th>
                            <th>Penjualan</th>
                            <th>Laba</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>April</td>
                        <td>500.000</td>
                        <td>1.000.000</td>
                        <td>500.000</td>
                        <!-- <?php
                        $i = 1; 
                        foreach ($obat as $data) : 
                        ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data->nama_obat; ?></td>
                            <td><?= $data->penyimpanan; ?></td>
                            <td><?= $data->kategori; ?></td>
                            <td><?= $data->stok; ?></td>
                            <td><?= $data->nama_pemasok; ?></td>
                            <td><?= $data->kedaluwarsa; ?></td>
                            <td><?= $data->h_jual; ?></td>
                        </tr>
                        <?php endforeach; ?> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>