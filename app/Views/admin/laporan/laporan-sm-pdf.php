<html>
    <head>
        <title>Laporan Surat Masuk</title>
    </head>
    <body>
        <div style="margin-bottom: 30px; text-align:center;">
            <h5 style="margin-bottom:2px">BUKU AGENDA SURAT MASUK</h5>
            <div style="margin-top:0px">.....................................</div>
        </div>
        
        <table style="width:100%" border="1" class="table table-bordered" id="Data_Table">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 10px">No</th>
                    <th rowspan="2" class="text-center">Tanggal Diterima</th>
                    <th colspan="2" class="text-center">Surat</th>
                    <th rowspan="2" >Perihal</th>
                    <th rowspan="2" >Pengirim</th>
                    <th rowspan="2" >Lampiran</th>
                    <th rowspan="2"  class="text-center">Kode Arsip</th>
                </tr>
                <tr>
                    <th>Tanggal Surat</th>
                    <th>Nomor Surat</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($SuratMasuk as $key => $value) { ?>
                    <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->tgl_diterima ?></td>
                    <td><?= $value->tgl_sm ?></td>
                    <td><?= $value->no_sm ?></td>
                    <td><?= $value->perihal ?></td>
                    <td><?= $value->id_unit ?></td>
                    <td><?= $value->lampiran ?></td>
                    <td><?= $value->kode_tersier ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>