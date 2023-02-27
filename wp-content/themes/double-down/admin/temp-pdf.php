<?php /* Template Name: PDF */
//get_header();



global $wpdb;	
$orderid = $_REQUEST['order_id'];	
$order_uid = get_post_meta($orderid, 'order_uid', true);
$user_info = get_userdata($order_uid); 
$compnay_name = get_user_meta($order_uid, 'compnay_name', true);               
$food_items =  get_post_meta( $orderid, 'food_order', true );	

$compnay_address =  get_user_meta( $order_uid, 'compnay_delivery_address', true );	
ob_start();

require( get_stylesheet_directory() . '/fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();	
$pdf->SetFont('Arial','B',20);



$pdf->SetFont('Arial','B',15);
$pdf->Cell(71 ,5,'Order Details',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,$order_week,0,1);





$pdf->SetFont('Arial','',10);
$pdf->Cell(130 ,5,$compnay_name,0,0);
$pdf->Cell(25 ,5,'Customer ID:',0,0);
$pdf->Cell(34 ,5,$order_uid,0,1);


$pdf->SetFont('Arial','',10);
$pdf->Cell(130 ,5,$compnay_address,0,0);



$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Order Id:',0,0);
$pdf->Cell(34 ,5,$orderid,0,1);


$pdf->SetFont('Arial','B',20);
$pdf->Cell(130 ,5,'Food Summary',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(189 ,10,'',0,1);



$pdf->Cell(50 ,10,'',0,1);

$pdf->SetFont('Arial','B',10);
/*Heading Of the table*/
$pdf->Cell(10 ,6,'Sr',1,0,'C');
$pdf->Cell(80 ,6,'Food Item',1,0,'C');
$pdf->Cell(23 ,6,'Qty',1,0,'C');
$pdf->Cell(30 ,6,'Unit Price',1,0,'C');
$pdf->Cell(20 ,6,'VAT',1,0,'C');
$pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/
/*Heading Of the table end*/
$pdf->SetFont('Arial','',10);


foreach($food_items as $index => $food) {
		$item_price_arr = array();
		$i = 1 ;
		foreach($food as $key => $ky_item) {
			$price = get_post_meta( $key, 'menu_item_price', true ); 
			$item_vat =  $price*15/100;
			$item_total = ($price+$item_vat)*$ky_item;	
			$item_price_arr[] = $item_total;
			$pdf->Cell(10 ,6,$i,1,0);
			$pdf->Cell(80 ,6, get_the_title($key),1,0);
			$pdf->Cell(23 ,6,$ky_item,1,0,'R');
			$pdf->Cell(30 ,6,$price,1,0,'R');
			$pdf->Cell(20 ,6,$item_vat,1,0,'R');
			$pdf->Cell(25 ,6,$item_total,1,1,'R');
			$i++; 
		}
}

$total = array_sum($item_price_arr);
$pdf->Cell(118 ,6,'',0,0);
$pdf->Cell(25 ,6,'Total',0,0);
$pdf->Cell(45 ,6,$total,1,1,'R');
ob_clean();
//$pdf->Output($orderid.".pdf",'I');
$pdf->Output();
  
       

get_footer(); ?>


