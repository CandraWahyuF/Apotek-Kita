<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url('user/form_penjualan'); ?>"><button class="btn btn-success mb-3">
                    <i class="fas fa-plus"> Tambah Penjualan</i></button></a>

            <div class="dropdown d-inline">
                <button class="btn btn-warning dropdown-toggle mb-3" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-expanded="false">
                    Export File
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?= base_url('user/excel'); ?>">EXCEL</a>
                    <!-- <a class="dropdown-item" href="#">PDF</a> -->
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Referensi</th>
                            <th>Nama Obat</th>
                            <th>Harga Jual</th>
                            <th>Banyak</th>
                            <th>Nama Pembeli</th>
                            <th>Tanggal Beli</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($penjualan as $data) : 
                    ?>
                        <tr>
                            <td><?= $data->ref; ?></td>
                            <td><?= $data->nama_obat; ?></td>
                            <td><?= $data->h_beli; ?></td>
                            <td><?= $data->banyak; ?></td>
                            <td><?= $data->nama_pembeli; ?></td>
                            <td><?= date('j F Y',strtotime($data->tgl_beli)); ?></td>
                            <td>Rp <?php echo number_format($data->grandtotal) ?></td>
                            <td style=" text-align: center;">
                                <a href="<?= base_url('user/lihat_nota/'). $data->ref?>"><button type="button"
                                        class="sbtn btn-success"><i class="fas fa-address-book"></i></button></a>
                                <a href="<?= base_url('user/edit_penjualan/'). $data->id_jual?>"><button type="edit"
                                        class="sbtn btn-success"><i class="fas fa-edit"></i></button></a>

                                <!-- <a href="<?= base_url('user/hapus_penjualan/'). $data->id_jual?>"><button type="delete"
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