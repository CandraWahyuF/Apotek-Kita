<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="<?php echo base_url('user/form_kategori'); ?>"><button class="btn btn-success mb-3">
                        <i class="fas fa-plus"> Tambah Ketegori</i></button></a>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; 
                        foreach ($kategori as $data) : 
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data->nama_kat; ?></td>
                            <td><?= $data->desk_kat; ?></td>
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