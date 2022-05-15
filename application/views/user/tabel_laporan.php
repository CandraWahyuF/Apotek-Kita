<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
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
                    <tbody id="laba"></tbody>
                    <tfoot id="labatotal"></tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$('#gabung').datetimepicker({

        format: 'YYYY',
        allowInputToggle: true
    })
    .on('dp.change', function(e) {

        gabungChart();
    });

function gabungChart() {

    var tahun_beli = $('#gabung').data('date');


    $.ajax({
        type: "POST",
        url: "<?php echo base_url('example/gabung') ?>",
        dataType: "JSON",

        data: {
            "tahun_beli": tahun_beli
        },
        success: function(data) {

            console.log(data);

            var total_inv = [];
            var total_pur = [];
            var month = [];

            for (var i in data) {
                total_inv.push(data[i].total_inv);
                total_pur.push(data[i].total_pur);
                month.push(data[i].month);
            }

            var chartdata = {
                labels: month,
                datasets: [{
                        label: 'Total Pembelian',
                        backgroundColor: 'rgba(57, 80, 103, 0.4)',
                        borderColor: 'rgba(57, 80, 103, 0.7)',
                        hoverBackgroundColor: 'rgba(57, 80, 103, 0.6)',
                        hoverBorderColor: 'rgba(57, 80, 103, 1)',

                        data: total_pur
                    },
                    {
                        label: 'Total Penjualan',
                        backgroundColor: 'rgba(26, 187, 156, 0.3)',
                        borderColor: 'rgba(26, 187, 156, 0.7)',
                        hoverBackgroundColor: 'rgba(26, 187, 156, 0.6)',
                        hoverBorderColor: 'rgba(26, 187, 156, 1)',
                        data: total_inv


                    }
                ]

            };

            var ctx = $("#report");

            var barGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata,
                options: {
                    responsive: true,
                    legend: {


                    },

                }
            });


        }
    });



    $.ajax({
        url: "<?php echo base_url('example/gabung') ?>",
        async: false,
        type: "POST",
        data: {
            "tahun_beli": tahun_beli
        },
        dataType: "JSON",
        success: function(data) {

            var html = '';
            var mytotal = '';
            var total_inv = 0;
            var total_pur = 0;


            for (i = 0; i < data.length; i++) {
                html += '<tr >' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td>' + data[i].month + '</td>' +
                    '<td>' + (parseInt(data[i].total_inv) || 0) + '</td>' +
                    '<td>' + (parseInt(data[i].total_pur) || 0) + '</td>' +
                    '<td>' + (data[i].total_inv - data[i].total_pur) + '</td>' +
                    '</tr>';
            }
            $("#laba").html(html); //pass the data to your tbody


            for (i = 0; i < data.length; i++) {
                total_inv += parseInt(data[i].total_inv) || 0;
                total_pur += parseInt(data[i].total_pur) || 0;
                mytotal = '<tr >' +
                    '<td>#</td>' +
                    '<td>Total</td>' +
                    '<td>' + total_inv + '</td>' +
                    '<td>' + total_pur + '</td>' +
                    '<td>' + (total_inv - total_pur) + '</td>' +
                    '</tr>';
            }
            $("#labatotal").html(mytotal); //pass the data to your tbody
        }


    })



}
</script>

<script>
$.ajax({

    url: "<?php echo base_url('example/chart_unit') ?>",
    method: "GET",

    success: function(data) {
        var data = JSON.parse(data);
        console.log(data);


        var stok = [];
        var unit = [];

        for (var i in data) {
            stok.push(data[i].stok);
            unit.push(data[i].unit);
        }

        var chartdata = {
            labels: unit,
            datasets: [{
                label: 'Stok obat',
                backgroundColor: 'rgba(26, 187, 156, 0.7)',
                borderColor: 'rgba(26, 187, 156, 0.7)',
                hoverBackgroundColor: 'rgba(26, 187, 156, 1)',
                hoverBorderColor: 'rgba(26, 187, 156, 1)',
                data: stok
            }]
        };

        var ctx = $("#unit_chart");

        var barGraph = new Chart(ctx, {
            type: 'bar',
            data: chartdata
        });


    }
});
</script>