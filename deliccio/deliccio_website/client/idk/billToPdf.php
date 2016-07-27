<?php
//include_once "include/config.php"; 
session_start();

$name = $_GET['name'];
$bill=$_GET['bill'];
$amt=$_GET['amt'];

$items=explode(";",$bill);

//require('html2pdf.php');
require("fpdf/fpdf.php");
require_once('class.phpmailer.php');
$pdf = new FPDF();
$pdf->AddPage();

//$pdf=new PDF_HTML();
$pdf->SetFont( "Arial", "B", 16 );
$pdf->Cell( 0, 10, "Bill {$name}", 1, 3, 'C' );
$pdf->Cell( 0, 10, "Name                  Quantity            :      Cost", 1, 3,'C' );
$pdf->SetFont( "Arial", "", 14 );
$mail=new PHPMailer();
$body="Text to send";
$mail->AddReplyTo("id@gmail.com","Deliccio");
$mail->SetFrom("id@gmail.com","Deliccio");
$address="email@gmail.com";
$mail->Subject = "Test Invoice";
$mail->AltBody="To view this message";
$mail->msgHTML($body);
for ( $i=0;$i<(count($items)-1);$i++ )
{
   $val=explode(",",$items[$i]);
 // print_r ($val);
   $pdf->Cell( 0, 10, "{$val[0]}                             {$val[1]}                   :      Rs. {$val[2]}", 1, 3,'C' );
}
$pdf->Cell( 50, 10, "Amount:      Rs.{$amt}", 1, 3,'C' );
$pdf->output();
?>