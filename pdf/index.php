<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'Daftar Stok Barang',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Musik Store',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'ID',1,0);
$pdf->Cell(85,6,'NAMA BARANG',1,0);
$pdf->Cell(27,6,'STOK BARANG',1,0);

$pdf->SetFont('Arial','',10);

include 'koneksi.php';
$barangg = mysqli_query($connect, "select * from barangg");
while ($row = mysqli_fetch_array($barangg)){
    $pdf->Cell(20,6,$row['id'],1,0);
    $pdf->Cell(85,6,$row['namabarang'],1,0);
    $pdf->Cell(27,6,$row['stok'],1,0);
}

$pdf->Output();
?>
