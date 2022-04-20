<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                <!-- notifikasi data berhasil ditambahkan -->
                <?php if ($this->session->flashdata('flash') ) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Kategori <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>

                <!-- button tambah kategori -->
                <a href="<?php echo base_url('user/form_kategori'); ?>"><button class="btn btn-success mb-3">
                        <i class="fas fa-plus"> Tambah Ketegori</i></button></a>
            
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

                <!-- tabel kategori -->
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
                                <a href="<?= base_url('user/edit_kategori/'). $data->id_kat?>"><button type="edit"
                                        class="sbtn btn-success"><i class="fas fa-edit"></i></button></a>

                                <a href="<?= base_url('user/hapus_kategori/'). $data->id_kat?>"><button type="delete"
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