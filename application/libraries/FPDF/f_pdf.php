<?php
include_once APPPATH . '/third_party/fpdf/fpdf.php';
class f_pdf extends FPDF
{
    // Load data
    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach ($lines as $line)
            $data[] = explode(';', trim($line));
        return $data;
    }

    // Simple table
    function BasicTable($header, $data)
    {
        // Header
        foreach ($header as $col)
            $this->Cell(40, 7, $col, 1);
        $this->Ln();
        // Data
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->Cell(40, 6, $col, 1);
            $this->Ln();
        }
    }

    function ImprovedTable($header, $data)
    {
        // Column widths
        $w = array(7, 30, 30, 30, 45, 70, 40, 25);
        // Header
        $this->SetFont('', 'B');
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();
        // Data
        $this->SetFont('');
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], '1', 0, 'C');
            $this->Cell($w[1], 6, $row[1], '1', 0, 'C');
            $this->Cell($w[2], 6, $row[2], '1', 0, 'C');
            $this->Cell($w[3], 6, $row[3], '1', 0, 'L');
            $this->Cell($w[4], 6, $row[4], '1', 0, 'C');
            $this->Cell($w[5], 6, $row[5], '1', 0, 'L');
            $this->Cell($w[6], 6, $row[6], '1', 0, 'C');
            $this->Cell($w[7], 6, $row[7], '1', 0, 'C');
            $this->Ln();
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }
    function ImprovedTablePembayaran($header, $data)
    {
        // Column widths
        $w = array(7, 60, 50, 30, 70, 30, 30);
        // Header
        $this->SetFont('', 'B');
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();
        // Data
        $this->SetFont('');
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], '1', 0, 'C');
            $this->Cell($w[1], 6, $row[1], '1', 0, 'L');
            $this->Cell($w[2], 6, $row[2], '1', 0, 'C');
            $this->Cell($w[3], 6, $row[3], '1', 0, 'L');
            $this->Cell($w[4], 6, $row[4], '1', 0, 'C');
            $this->Cell($w[5], 6, $row[5], '1', 0, 'L');
            $this->Cell($w[6], 6, $row[6], '1', 0, 'L');
            $this->Ln();
        }
        // Closing line
        // $this->Cell(array_sum($w), 0, '', 'T');
    }
    // Better table
    function ImprovedTableConfirm($header, $data)
    {
        // Column widths
        $w = array(7, 30, 30, 40, 45, 86, 40);
        // Header
        $this->SetFont('', 'B');
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();
        // Data
        $this->SetFont('');
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], '1', 0, 'C');
            $this->Cell($w[1], 6, $row[1], '1', 0, 'C');
            $this->Cell($w[2], 6, $row[2], '1', 0, 'C');
            $this->Cell($w[3], 6, $row[3], '1', 0, 'L');
            $this->Cell($w[4], 6, $row[4], '1', 0, 'C');
            $this->Cell($w[5], 6, $row[5], '1', 0, 'L');
            $this->Cell($w[6], 6, $row[6], '1', 0, 'C');
            $this->Ln();
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Colored table
    function FancyTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(40, 35, 40, 45);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row[2], 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, $row[3], 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }
    public function ImageFromPath($path, $x, $y, $w, $h, $type, $link = '')
    {
        if (is_file($path)) {
            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
            if ($ext == 'png') {
                $type = ($type ? $type : 'PNG');
                parent::Image($path, $x, $y, $w, $h, $type, $link);
            } elseif ($ext == 'jpg' || $ext == 'jpeg') {
                $type = ($type ? $type : 'JPEG');
                parent::Image($path, $x, $y, $w, $h, $type, $link);
            }
        }
    }
}
?>