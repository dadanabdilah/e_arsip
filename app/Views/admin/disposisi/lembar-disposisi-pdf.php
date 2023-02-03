<html>
    <head>
        <title>Lembar Disposisi</title>
        <style>
            table{
                width : 100%;
            }
        </style>
    </head>
    <body>
        <div style="margin-bottom: 30px; text-align:center;">
            <h3 style="margin-bottom:2px">LEMBAR DISPOSISI</h3>
        </div>

        <table border="1" class="table table-bordered tabel-resposive">
            <tbody>
                <tr>
                    <td align="left">Agno : </td>
                    <td align="left">Tanggal Penerimaan : <?= $Disposisi->tgl_terima ?></td>
                </tr>
                <tr>
                    <td align="left">Tingkat Keamanan : <?= $Disposisi->tingkat_keamanan ?> </td>
                    <td align="left">Tanggal Penyelesaian : <?= $Disposisi->tgl_selesai ?> </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <ul style="list-style-type: none; margin-top:10px;">
                            <li>Tanggal Surat : <?= $Disposisi->tgl_sm ?> </li>
                            <li>Nomor Surat : <?= $Disposisi->no_sm ?></li>
                            <li>Dari : <?= $Disposisi->nama_unit ?> </li>
                            <li>Ringkasan Isi : <?= $Disposisi->perihal ?> </li>
                            <li>Lampiran : <?= $Disposisi->lampiran ?> </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td align="left">Disposisi : <?= $Disposisi->disposisi ?> </td>
                    <td align="left">Diteruskan Kepada : <?= $Disposisi->nama_bidang ?> </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>