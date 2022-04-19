<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_title">
                        <h2>Tambah Penjualan Baru</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <form action="#" method="post" class="form-horizontal form-label-left" novalidate>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pembeli</label>
                                <input type="email" class="form-control col-8" id="nama_pembeli">
                            </div>
                            <div class="form-group justify-content-center">
                                <label for="exampleInputPassword1">Tanggal Transaksi</label>
                                <input type="date" class="form-control col-8" id="tanggal_beli">
                            </div>

                            <table id="purchase" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Obat yang dibeli</th>
                                        <th style="text-align: center">Stok</th>
                                        <th style="text-align: center">Unit</th>
                                        <th style="text-align: center">Harga</th>
                                        <th style="text-align: center">Banyak</th>

                                        <th style="text-align: center">Subtotal</th>
                                        <th style="text-align: center">Aksi</th>

                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <td style="text-align:right; vertical-align: middle" colspan="5">
                                            <b>Grandtotal</b>
                                        </td>
                                        <td>
                                            <input id="grandtotal" name="grandtotal" type="text"
                                                class="form-control grandtotal" readonly>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo base_url('example/table_invoice') ?>"><button type="button"
                                            class="btn btn-danger">Batal</button></a>
                                    <button id='addpurchase' class="btn btn-info" type="button"><span
                                            class="fa fa-plus"></span>
                                        Tambah Produk</button>
                                    <button id="send" type="submit" class="btn btn-success">Simpan</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>