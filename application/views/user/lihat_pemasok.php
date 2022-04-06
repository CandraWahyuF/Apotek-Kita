<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url('user/form_pemasok'); ?>"><button class="btn btn-success mb-3">
                    <i class="fas fa-plus"> Tambah Pemasok</i></button></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemasok</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; 
                        foreach ($pemasok as $data) : 
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data->nama_pemasok; ?></td>
                            <td><?= $data->alamat_pemasok; ?></td>
                            <td><?= $data->telepon_pemasok; ?></td>
                            <td>
                                <button>EDIT</button>
                                <button>HAPUS</button>
                            </td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>