<?php
require('fpdf.php');

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Helvetica','',18);
$pdf->Cell(190,30,'',0,1);
$pdf->Image('D:\Xampp2\htdocs\IMS\images\inventory.png',20,30,30,30,'PNG');
$pdf->Cell(150,10,'',0,0);
$pdf->Cell(40,10,'INVOICE',0,1,'C');
$pdf->Ln();

$pdf->SetFont('Helvetica','',14);
$pdf->Cell(40,10,'Invoice To ',0,1);
// $pdf->Ln();


$tot=0;
if(isset($_POST['Viewbtn'])){
$sn = "localhost";
$un="root";
$pw = "";
$db="imsdb";

$getCid= $getSDate = "";
if(isset($_POST['cid'])){
$getCid=$_POST['cid'];
}
if(isset($_POST['choose_date'])){
    $getSDate = $_POST['choose_date'];
}

$con = mysqli_connect($sn, $un, $pw, $db);
$getReportDetails = "SELECT * FROM sale_details WHERE cid='$getCid' AND sdate='$getSDate'";
$res = mysqli_query($con,$getReportDetails);
$query = "select * from customer_details where cid='$getCid'";
$res2 = mysqli_query($con, $query);
$cname = $c_email = $c_location = $c_phone ="";
while($row = mysqli_fetch_array($res2)){
    $c_name = $row['cname'];
    $c_email = $row['email'];
    $c_location = $row['location'];
    $c_phone = $row['phone'];
}
$pdf->Cell(40,10,"Name: ",0,0); 
$pdf->Cell(40,10,$c_name,0,0);
$pdf->Cell(50,10,'Email: ',0,0,'R');
$pdf->Cell(80,10,$c_email,0,1);
$pdf->Cell(40,10,"Phone: ",0,0);
$pdf->Cell(40,10,$c_phone,0,0);

$pdf->Cell(70,10,'Location: ',0,0,'R');
$pdf->Cell(80,10,$c_location,0,1);

$pdf->Cell(190,10,'',0,1);
$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(255,255,255);
$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');
$header = array('Product', 'Price', 'Qty', 'Total');
$w = array(70, 35, 40, 45);
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],8,$header[$i],1,0,'C',true);
$pdf->Ln();

    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    while($row = mysqli_fetch_array($res))
    {
        $pdf->Cell($w[0],8,$row['item_name'],'LR',0,'C',true);
        $pdf->Cell($w[1],8,number_format($row['qty']),'LR',0,'C',true);
        $pdf->Cell($w[2],8,number_format($row['price']),'LR',0,'C',true);
        $pdf->Cell($w[3],8,number_format($row['net']),'LR',0,'C',true);
        $tot += number_format($row['net']);
        $pdf->Ln();
    }
    $pdf->Cell(50,140,'',0,1);
$pdf->Cell(50,10,'Total Amount in Rs:',0,0);
$pdf->Cell(30,10,$tot.'.00',0,0);


$pdf->Output();
}
if(isset($_POST['Printbtn'])){
    $sn = "localhost";
$un="root";
$pw = "";
$db="imsdb";

$getCid= $getSDate = "";
if(isset($_POST['cid'])){
$getCid=$_POST['cid'];
}
if(isset($_POST['choose_date'])){
    $getSDate = $_POST['choose_date'];
}

$con = mysqli_connect($sn, $un, $pw, $db);
$getReportDetails = "SELECT * FROM sale_details WHERE cid='$getCid' AND sdate='$getSDate'";
$res = mysqli_query($con,$getReportDetails);
$query = "select * from customer_details where cid='$getCid'";
$res2 = mysqli_query($con, $query);
$cname = $c_email = $c_location = $c_phone ="";
while($row = mysqli_fetch_array($res2)){
    $c_name = $row['cname'];
    $c_email = $row['email'];
    $c_location = $row['location'];
    $c_phone = $row['phone'];
}
$pdf->Cell(40,10,"Name: ",0,0); 
$pdf->Cell(40,10,$c_name,0,0);
$pdf->Cell(50,10,'Email: ',0,0,'R');
$pdf->Cell(80,10,$c_email,0,1);
$pdf->Cell(40,10,"Phone: ",0,0);
$pdf->Cell(40,10,$c_phone,0,0);

$pdf->Cell(70,10,'Location: ',0,0,'R');
$pdf->Cell(80,10,$c_location,0,1);

$pdf->Cell(190,10,'',0,1);
$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(255,255,255);
$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');
$header = array('Product', 'Price', 'Qty', 'Total');
$w = array(70, 35, 40, 45);
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],8,$header[$i],1,0,'C',true);
$pdf->Ln();

    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    while($row = mysqli_fetch_array($res))
    {
        $pdf->Cell($w[0],8,$row['item_name'],'LR',0,'C',true);
        $pdf->Cell($w[1],8,number_format($row['qty']),'LR',0,'C',true);
        $pdf->Cell($w[2],8,number_format($row['price']),'LR',0,'C',true);
        $pdf->Cell($w[3],8,number_format($row['net']),'LR',0,'C',true);
        $tot += number_format($row['net']);
        $pdf->Ln();
    }
$pdf->Output('D','invoice.pdf');
}


?>