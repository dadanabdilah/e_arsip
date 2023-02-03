<html>
    <head>
        <title>Laporan Disposisi</title>
        <style>
            table{
                width : 100%;
            }
        </style>
    </head>
    <body>
        <div style="margin-bottom: 30px; text-align:center;">
            <h5 style="margin-bottom:2px">LAPORAN AGENDA DISPOSISI</h5>
            <div style="margin-top:0px">.....................................</div>
        </div>

        <table border="1" class="table table-bordered tabel-resposive">
            <thead>
                <tr>
                    <th style="width: 10px">No</th>
                    <th class="text-center">Tanggal Terima</th>
                    <th>Tingkat Keamanan</th>
                    <th>Tanggal Selesai</th>
                    <th>Nomor Surat</th>
                    <th>Diteruskan Kepada</th>
                    <th>Disposisi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($Disposisi as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value->tgl_terima ?></td>
                        <td><?= $value->tingkat_keamanan ?></td>
                        <td><?= $value->tgl_selesai ?></td>
                        <td><?= $value->no_sm ?></td>
                        <td><?= $value->nama_bidang ?></td>
                        <td><?= $value->disposisi ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>