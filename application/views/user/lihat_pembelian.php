<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url('user/form_pembelian'); ?>"><button class="btn btn-success mb-3">
                    <i class="fas fa-plus"> Tambah Pembelian</i></button></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Referensi</th>
                            <th>Nama Obat</th>
                            <th>Harga Beli</th>
                            <th>Banyak</th>
                            <th>Nama Pemasok</th>
                            <th>Tanggal Beli</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pembelian as $data) : 
                    ?>
                        <tr>
                            <td><?= $data->koderef; ?></td>
                            <td><?= $data->nama_obat; ?></td>
                            <td><?= $data->h_beli; ?></td>
                            <td><?= $data->banyak; ?></td>
                            <td><?= $data->nama_pemasok; ?></td>
                            <td><?= $data->tgl_beli; ?></td>
                            <td><?= $data->total; ?></td>
                            <td>
                                <a href="<?= base_url('user/edit_obat/'). $data->id_beli?>"><button type="edit"
                                        class="sbtn btn-success"><i class="fas fa-edit"></i></button></a>

                                <!-- <a href="<?= base_url('user/hapus_pembelian/'). $data->id_beli?>"><button type="delete"
                                        class="sbtn btn-danger"><i class="fas fa-trash"></i></button></a> -->
                            </td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>