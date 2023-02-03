<html>
    <head>
        <title>Laporan Surat Keluar</title>
        <style>
            table{
                width : 100%;
            }
        </style>
    </head>
    <body>
        <div style="margin-bottom: 30px; text-align:center;">
            <h5 style="margin-bottom:2px">BUKU AGENDA SURAT KELUAR</h5>
            <div style="margin-top:0px">.....................................</div>
        </div>

        <table border="1" class="table table-bordered" id="Data_Table">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 10px">No</th>
                    <th colspan="2">Surat</th>
                    <th rowspan="2">Perihal</th>
                    <th rowspan="2">Hubungan</th>
                    <th rowspan="2">Dikirim Kepada</th>
                    <th rowspan="2" class="text-center">Kode Arsip</th>
                </tr>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($SuratKeluar as $key => $value) { ?>
                    <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->tgl_sk ?></td>
                    <td><?= $value->no_sk ?></td>
                    <td><?= $value->perihal ?></td>
                    <td><?= $value->hubungan ?></td>
                    <td><?= $value->nama_unit ?></td>
                    <td><?= $value->kode_tersier ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>