<?php /* Template Name: PDF-All */
//get_header();



		global $wpdb;	
		$orderid = $_REQUEST['order_id'];	
		$order_uid = get_post_meta($orderid, 'order_uid', true);
		$user_info = get_userdata($order_uid); 
		$compnay_name = get_user_meta($order_uid, 'compnay_name', true);               
		$food_items =  get_post_meta( $orderid, 'food_order', true );
		$today = date("Y-m-d", strtotime('today'));
		$today = "2022-10-21";
		ob_start();
		require( get_stylesheet_directory() . '/fpdf/fpdf.php');
		

		$pdf = new FPDF('P','mm','A4');
		
		$pdf->AddPage();	
		$pdf->SetFont('Arial','B',20);
		$pdf->Cell(71 ,5,'Order Details',0,0);
		$pdf->Cell(59 ,5,'',0,0);

		$pdf->Cell(59 ,5,$order_week,0,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(130 ,5,'',0,0);
		$pdf->Cell(25 ,5,'Date:',0,0);
		$pdf->Cell(34 ,5,$today,0,1);
		$pdf->Ln();


		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(130 ,5,'Food  Summary',0,0);
		$pdf->Cell(59 ,5,'',0,0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(189 ,10,'',0,1);


		







		$user_arr = array();
		$i = 0;
		query_posts(array(
			'post_type' => 'orders',
			'posts_per_page' => -1,
			'order' => 'desc',
			'meta_query' => array(   
					array(
						'key'     => 'order_day',			
						'value' => $today,
						'compare' => 'IN'
					)
			)   
		));

		if (have_posts()) :  while (have_posts()) : the_post();
		$order_uid = get_post_meta(get_the_ID(),'order_uid', true);
		$user_arr[] = $order_uid;
		endwhile;
		wp_reset_query();else :  endif; 
		
		$companies = array_unique($user_arr);


		foreach($companies as $company)
			{


			$company_name = 	get_user_meta($company, 'compnay_name', true );
			$compnay_address =  get_user_meta( $company, 'compnay_delivery_address', true );	

			
			$available_active_employee = get_users(
				array(
					'role' => 'personal',
					'meta_query' => array(
						array(
							'key' => 'employee',
							'value' => $company,
							'compare' => '=='
						),
						array(
							'key' => 'status',
							'value' => 'active',
							'compare' => '=='
						)
					)
				)
			);

			


			
				


				
			$pdf->SetFont('Arial','B',15);
			$pdf->Cell(130 ,5,$company_name,0,0);
			$pdf->Cell(59 ,5,'',0,0);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(189 ,10,'',0,1);
			

			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(130 ,5,$compnay_address,0,0);
			$pdf->Cell(59 ,5,'',0,0);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(50 ,10,'',0,1);


			   $pdf->SetFont('Arial','',10);
				/*Heading Of the table*/
				$pdf->Cell(10 ,6,'Sr',1,0,'C');
				$pdf->Cell(80 ,6,'Food Item',1,0,'C');
				$pdf->Cell(23 ,6,'Qty',1,0,'C');
				$pdf->Cell(30 ,6,'Unit Price',1,0,'C');
				$pdf->Cell(20 ,6,'VAT',1,0,'C');
				$pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/

				query_posts(array(
					'post_type' => 'orders',
					'posts_per_page' => -1,
					'order' => 'desc',
					'meta_query' => array(
							array(
								'key' => 'order_day',
								'value' => $today,
								'compare' => '=',
							) ,
							array(
								'key'     => 'order_uid',			
								'value' => $company,
								'compare' => 'IN'
							
							)         
						),
				
					
				)); 
				if (have_posts()) :  while (have_posts()) : the_post(); 

				$pid = get_the_ID();				

				$food_orderd_data = get_post_meta($pid, 'food_order', true);
					foreach($food_orderd_data as $index => $food) {
						$item_price_arr = array();
						$i = 1 ;
						foreach($food as $key => $ky_item) {
							$price = get_post_meta( $key, 'menu_item_price', true ); 
							$item_vat =  $price*15/100;
							$item_total = ($price+$item_vat)*$ky_item;	
							$item_price_arr[] = $item_total;
							$pdf->Cell(10 ,6,$i,1,0);
							$pdf->Cell(80 ,6,strip_tags(get_the_title($key)),1,0);
							$pdf->Cell(23 ,6,$ky_item,1,0,'R');
							$pdf->Cell(30 ,6,$price,1,0,'R');
							$pdf->Cell(20 ,6,$item_vat,1,0,'R');
							$pdf->Cell(25 ,6,$item_total,1,1,'R');							
							$i++; 
						}

						

						
						$pdf->Ln(5);

						$pdf->SetFont('Arial','B',15);
						$pdf->Cell(130 ,5,'Allergies By Employees',0,0);
						$pdf->Cell(59 ,5,'',0,0);
						$pdf->SetFont('Arial','B',10);
						$pdf->Cell(189 ,10,'',0,1);

				foreach ($available_active_employee as $employee) {
					$emp_id = $employee->ID;
					$emp_name = $employee->user_login;
					$emp_allergies = get_user_meta( $emp_id, 'profile_alergies', true ); 
					if((get_user_meta($emp_id, "profile_alergies", true))) {
							$pdf->SetFont('Arial','',13);
							$pdf->Cell(100,4,$emp_name,0,1,'L');
							$pdf->Ln(3);								
							if(!empty($emp_allergies)) {
								foreach($emp_allergies as $allergy)	{
									$pdf->SetFont('Arial','',10);
									$pdf->Cell(100,4,$allergy,0,1,'L');							
										
								}
								$pdf->Ln(10);
							}	

					 }
	
				}

				$pdf->Ln(20);
						
						
				}

				
			
				endwhile;


				
				
				
				
				wp_reset_query(); else : endif; 


				
			

		}




		// $total = array_sum($item_price_arr);
		// $pdf->Cell(118 ,6,'',0,0);
		// $pdf->Cell(25 ,6,'Total',0,0);
		// $pdf->Cell(45 ,6,$total,1,1,'R');
		ob_clean();
		//$pdf->Output($orderid.".pdf",'I');
		$pdf->Output();
		
       

	get_footer(); ?>


