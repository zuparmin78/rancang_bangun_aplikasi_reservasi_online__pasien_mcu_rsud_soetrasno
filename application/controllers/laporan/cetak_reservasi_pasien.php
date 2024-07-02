<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class cetak_reservasi_pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->library('FPDF/f_pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
        $this->load->library('FPDF/LetterHead'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }
    function index($id_reservasi)
    {
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
            ->where('r.id_reservasi', $id_reservasi)
            ->get()->result();

        $hasil = json_decode(json_encode($result), true);

        $imagePath = base_url('bootslander/img/soetrasno.png');

        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new LetterHead('P', 'mm', 'a5');
        $pdf->AddPage('P', 'a5');
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->ln(7);
        $pdf->Cell(0, 7, 'BUKTI RESERVASI PASIEN', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->Image($imagePath, 10, 5, 40);

        // $data = $pdf->LoadData('countries.txt');
        $pdf->SetFont('Arial', '', 10);
        $pdf->ln(5);
        $pdf->Cell(40, 7, 'Nama Pasien', 0, 0, 'L');
        $pdf->Cell(40, 7, ':  ' . $hasil[0]['nama_pasien'], 0, 0, 'L');
        $pdf->ln(7);
        $pdf->Cell(40, 7, 'Tempat, Tanggal Lahir', 0, 0, 'L');
        $pdf->Cell(40, 7, ':  ' . $hasil[0]['tmpt_lahir'] . ', ' . $fmt->format(new DateTime($hasil[0]['tglahir_pasien'])), 0, 0, 'L');
        $pdf->ln(7);
        $pdf->Cell(40, 7, 'Nomor Registrasi', 0, 0, 'L');
        $pdf->Cell(40, 7, ':  ' . $hasil[0]['no_reg'], 0, 0, 'L');
        $pdf->ln(7);
        $pdf->Cell(40, 7, 'Nama Paket', 0, 0, 'L');
        $pdf->Cell(40, 7, ':  ' . $hasil[0]['namapaket'], 0, 0, 'L');
        $pdf->ln(7);
        $pdf->Cell(40, 7, 'Order ID', 0, 0, 'L');
        $pdf->Cell(40, 7, ':  ' . $hasil[0]['id_order'], 0, 0, 'L');
        $pdf->ln(7);
        $pdf->Cell(40, 7, 'Tanggal Kedatangan', 0, 0, 'L');
        $pdf->Cell(40, 7, ':  ' . $fmt->format(new DateTime($hasil[0]['tgl_kedatangan'])), 0, 0, 'L');
        $pdf->ln(17);
        $pdf->Cell(0, 7, 'Nomor Antrian', 0, 0, 'C');
        $pdf->ln(15);
        $pdf->SetFont('Arial', 'B', 40);
        $pdf->Cell(0, 7, $hasil[0]['no_antri'], 0, 0, 'C');

        // $pdf->Output($hasil[0]['no_reg'].'.pdf', 'D');
        $pdf->Output();
    }
}