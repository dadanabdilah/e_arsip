<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use Dompdf\Dompdf;
use Dompdf\Options;

class Laporan extends BaseController
{
    public function sm()
    {
        if($this->request->getPost('filter')){
            $tanggal_awal = $this->request->getPost('tanggal_awal');
            $tanggal_akhir = $this->request->getPost('tanggal_akhir');
            $data = [
                'SuratMasuk'  => $this->SMasuk->where('tgl_diterima BETWEEN ' . $tanggal_awal . ' AND ' . $tanggal_akhir)->findAll(),
                'title' => 'Laporan Surat Masuk',
                'sub_title' => 'Laporan Data Surat Masuk'
            ];
            return view('admin/laporan/laporan-sm', $data);
        } else {
            if( ! $this->request->getPost('pdf')){
                $data = [
                    'SuratMasuk'  => $this->SMasuk->findAll(),
                    'title' => 'Laporan Surat Masuk',
                    'sub_title' => 'Laporan Data Surat Masuk'
                ];
                return view('admin/laporan/laporan-sm', $data);
            } else {
                $tanggal_awal = $this->request->getPost('tanggal_awal');
                $tanggal_akhir = $this->request->getPost('tanggal_akhir');

                $data = [
                    'SuratMasuk'  => $this->SMasuk->where('tgl_diterima BETWEEN ' . $tanggal_awal . ' AND ' . $tanggal_akhir)->findAll(),
                    'title' => 'Laporan Surat Masuk',
                    'sub_title' => 'Laporan Data Surat Masuk'
                ];
                $html = view('admin/laporan/laporan-sm-pdf', $data);

                $options = new Options();
                $options->set('isRemoteEnabled', true);
                $dompdf = new Dompdf($options);
                $dompdf->loadHtml($html);
                $dompdf->setPaper("A4", "landscape");
                $dompdf->render();

                $dompdf->stream("Coba.pdf", array("Attachment" => 0));
            }
        }
    }

    public function sk()
    {
        if($this->request->getPost('filter')){
            $tanggal_awal = $this->request->getPost('tanggal_awal');
            $tanggal_akhir = $this->request->getPost('tanggal_akhir');
            $data = [
                'SuratKeluar'  => $this->SKeluar->withUnit()->where('tgl_sk BETWEEN ' . $tanggal_awal . ' AND ' . $tanggal_akhir)->findAll(),
                'title' => 'Laporan Surat Keluar',
                'sub_title' => 'Laporan Data Surat Keluar'
            ];
            return view('admin/laporan/laporan-sk', $data);
        } else {
            if( ! $this->request->getPost('pdf')){
                $data = [
                    'SuratKeluar'  => $this->SKeluar->withUnit()->findAll(),
                    'title' => 'Laporan Surat Keluar',
                    'sub_title' => 'Laporan Data Surat Keluar'
                ];       
                return view('admin/laporan/laporan-sk', $data);
            } else {
                $tanggal_awal = $this->request->getPost('tanggal_awal');
                $tanggal_akhir = $this->request->getPost('tanggal_akhir');

                $data = [
                    'SuratKeluar'  => $this->SKeluar->withUnit()->where('tgl_sk BETWEEN ' . $tanggal_awal . ' AND ' . $tanggal_akhir)->findAll(),
                    'title' => 'Laporan Surat Keluar',
                    'sub_title' => 'Laporan Data Surat Keluar'
                ];
                $html = view('admin/laporan/laporan-sk-pdf', $data);

                $options = new Options();
                $options->set('isRemoteEnabled', true);
                $dompdf = new Dompdf($options);
                $dompdf->loadHtml($html);
                $dompdf->setPaper("A4", "landscape");
                $dompdf->render();

                $dompdf->stream("Coba.pdf", array("Attachment" => 0));
            }
        }
    }

    public function disposisi()
    {
        if($this->request->getPost('filter')){
            $tanggal_awal = $this->request->getPost('tanggal_awal');
            $tanggal_akhir = $this->request->getPost('tanggal_akhir');
            
            $data = [
                'Disposisi'  => $this->SDisposisi->withSuratMasuk()->withBidang()->where('disposisi.tgl_selesai BETWEEN ' . $tanggal_awal . ' AND ' . $tanggal_akhir)->findAll(),
                'title' => 'Laporan Disposisi',
                'sub_title' => 'Laporan Data Disposisi'
            ];
            return view('admin/laporan/laporan-disposisi', $data);
        } else {
            if( ! $this->request->getPost('pdf')){
                $data = [
                    'Disposisi'  => $this->SDisposisi->withSuratMasuk()->withBidang()->findAll(),
                    'title' => 'Laporan Disposisi',
                    'sub_title' => 'Laporan Data Disposisi'
                ];
                return view('admin/laporan/laporan-disposisi', $data);
            } else {
                $tanggal_awal = $this->request->getPost('tanggal_awal');
                $tanggal_akhir = $this->request->getPost('tanggal_akhir');

                $data = [
                    'Disposisi'  => $this->SDisposisi->withSuratMasuk()->withBidang()->where('disposisi.tgl_selesai BETWEEN ' . $tanggal_awal . ' AND ' . $tanggal_akhir)->findAll(),
                    'title' => 'Laporan Disposisi',
                    'sub_title' => 'Laporan Data Disposisi'
                ];

                $html = view('admin/laporan/laporan-disposisi-pdf', $data);

                $options = new Options();
                $options->set('isRemoteEnabled', true);
                $dompdf = new Dompdf($options);
                $dompdf->loadHtml($html);
                $dompdf->setPaper("A4", "landscape");
                $dompdf->render();

                $dompdf->stream("Coba.pdf", array("Attachment" => 0));
            }
        }
    }
}
