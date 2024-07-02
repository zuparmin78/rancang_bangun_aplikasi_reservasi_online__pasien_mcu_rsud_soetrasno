<?php
defined('BASEPATH') or exit('No direct script access allowed');
class cetak_laporan_reservasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->library('FPDF/f_pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
        $this->load->library('FPDF/LetterHead'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }
    function index()
    {
        $min_tgl = $this->input->post('min_tanggal');
        $max_tgl = $this->input->post('max_tanggal');
        $fmt = new IntlDateFormatter(
            'ID',
            IntlDateFormatter::FULL,
            IntlDateFormatter::FULL
        );
        $fmt->setPattern('dd LLLL yyyy');
        $result = $this->db->select('*')
            ->from('reservasi r')
            ->join('paket_mcu m', 'm.kodepaket=r.kode_paket', 'left')
            ->join('pembayaran p', 'p.order_id=r.id_order', 'left')
            ->join('pasien_mcu pm', 'pm.id=r.id_pasien', 'left')
            ->where('r.tgl_kedatangan >=', $min_tgl)
            ->where('r.tgl_kedatangan <=', $max_tgl)
            ->order_by('r.tgl_kedatangan', 'asc')
            ->order_by('m.namapaket', 'asc')
            ->get()->result();
        $bagus = [];
        $no = 1;
        foreach ($result as $r) {
            if ($r->status_pasien == 0) {
                $status = "Tidak Datang";
            } else if ($r->status_pasien == 1) {
                $status = "Datang";
            }
            $bagus[] = array(
                $no++,
                $fmt->format(new DateTime($r->tgl_kedatangan)),
                $r->nik_pasien,
                $r->nama_pasien,
                $r->tmpt_lahir . ", " . $fmt->format(new DateTime($r->tglahir_pasien)),
                $r->alamat_pasien,
                $r->namapaket,
                $status,
            );
        }
        $imagePath = base_url('bootslander/img/soetrasno.png');

        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new LetterHead('L', 'mm', 'Letter');
        $pdf->AddPage('L', 'A4');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 7, 'LAPORAN PENDAFTARAN RESERVASI PASIEN MCU', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        // $pdf->ImageFromPath($imagePath, 10, 10, 100, 0, 'PNG');
        $pdf->Image($imagePath, 10, 5, 50);
        // echo 'RESULT <br><pre>';
        // echo print_r($bagus);
        // echo '</pre>';

        // Column headings
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(7, 6, 'Periode Reservasi : ' . $fmt->format(new DateTime($min_tgl)) . ' s/d ' . $fmt->format(new DateTime($max_tgl)), 0, 1, 'L');
        $pdf->Cell(10, 1, '', 0, 1);

        $header = array('No', 'Tanggal Kedatangan', 'NIK', 'Nama Pasien', 'Tempat, Tanggal Lahir', 'Alamat', 'Nama Paket', 'Kedatangan');
        // Data loading
        $data = $bagus;
        // $data = $pdf->LoadData('countries.txt');
        $pdf->SetFont('Arial', '', 8);
        $pdf->ImprovedTable($header, $data);


        // $pdf->Cell(10, 7, '', 0, 1);
        // $pdf->SetFont('Arial', 'B', 10);
        // $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        // $pdf->Cell(20, 6, 'Tanggal Kedatangan', 1, 0, 'C');
        // $pdf->Cell(40, 6, 'NIK', 1, 0, 'C');
        // $pdf->Cell(50, 6, 'Nama Pasien', 1, 0, 'C');
        // $pdf->Cell(60, 6, 'Tempat, Tanggal Lahir', 1, 0, 'C');
        // $pdf->Cell(80, 6, 'Alamat', 1, 0, 'C');
        // $pdf->Cell(40, 6, 'Nama Paket', 1, 1, 'C');
        // $pdf->SetFont('Arial', '', 10);
        // $reservasi = $this->M_reservasi->tampil_data()->result();
        // $no = 0;
        // foreach ($reservasi as $data) {
        //     $no++;
        //     $pdf->Cell(10, 6, $no, 1, 0, 'C');
        //     $pdf->Cell(20, 6, $data->tgl_kedatangan, 1, 0);
        //     $pdf->Cell(40, 6, $data->nik_pasien, 1, 0);
        //     $pdf->Cell(50, 6, $data->nama_pasien, 1, 0);
        //     $pdf->Cell(60, 6, $data->tmpt_lahir . ", " . $fmt->format(new DateTime($data->tglahir_pasien)), 1, 0);
        //     $pdf->Cell(80, 6, $data->alamat_pasien, 1, 0);
        //     $pdf->Cell(40, 6, $data->namapaket, 1, 1);
        // }


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetMargins(30, 0);
        $pdf->Signature($fmt->format(time()), 'Nur Cholis Abdul Rohman', 'Rembang', 'Kepala Instalasi Rekam Medik');


        // $pdf->AddPage();
        // $pdf->SetMargins(15, 10);

        // // start generae letter head (kop surat)
        // $pdf->SetWidths(159); // width of box in out text
        // $pdf->AddLetterHeadFontSize(['10', '12', '10', '10', '10']); //default font size=10
        // $pdf->AddLetterHeadFontStyle(['B', 'B', '', '', '']); //default font type normal
        // $pdf->AddLetterHead(['DOKUMEN RINCIAN KEGIATAN', 'ANGGARAN PENDAPATAN DAN BELANJA DESA TAHUN 2015', '(DRK)', 'PEMERINTAH DESA AMBON MANISE KABUPATEN KOTA AMBON', 'Tahun Anggaran 2015'], $imagePath);

        $pdf->Output();
    }
}