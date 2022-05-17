<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <!-- notifikasi data berhasil ditambahkan -->
            <?php if ($this->session->flashdata('flash') ) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Obat <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php endif; ?>
            <a href="<?php echo base_url('user/form_obat'); ?>"><button class="btn btn-success mb-3">
                    <i class="fas fa-plus"> Tambah Obat</i></button></a>

            <div class="dropdown d-inline">
                <button class="btn btn-warning dropdown-toggle mb-3" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-expanded="false">
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
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Penyimpanan</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Pemasok</th>
                            <th>Kedaluwarsa</th>
                            <th>Harga Jual</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; 
                        foreach ($obat as $data) : 
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data->nama_obat; ?></td>
                            <td><?= $data->penyimpanan; ?></td>
                            <td><?= $data->nama_kat; ?></td>
                            <td><?= $data->stok; ?></td>
                            <td><?= $data->nama_pemasok; ?></td>
                            <td><?= date('j F Y',strtotime($data->kedaluwarsa)); ?></td>
                            <td>Rp<?= number_format($data->h_jual); ?></td>
                            <td>
                                <a href="<?= base_url('user/edit_obat/'). $data->id?>"><button type="edit"
                                        class="sbtn btn-success"><i class="fas fa-edit"></i></button></a>

                                <a href="<?= base_url('user/hapus_obat/'). $data->id?>"><button type="delete"
                                        class="sbtn btn-danger" onclick="return confirm('Yakin?')"><i
                                            class="fas fa-trash"></i></button></a>
                            </td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf',
        ]
    });
});
</script>