<?php load_theme_textdomain('ddd_translate'); 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 140, 140, true );
	add_image_size( 'single-post-thumbnail', 300, 9999 );
    add_image_size( 'product-thumbnail', 260, 220, true );

    

	// Add RSS links to <head> section
	//automatic_feed_links();
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
		// Declare sidebar widget zone
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4>',
    		'after_title'   => '</h4>'
    	));
    }

function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

if (function_exists('register_nav_menus')) {
register_nav_menus( array(
		'main' => __( 'Main Menu', '' ),
        'landing' => __( 'Landing Menu', '' ),
		'profile' => __( 'Profile Menu', '' ),
        'company' => __( 'Company Menu', '' ),
        'admin' => __( 'Admin Menu', '' )
	) );
}

function fallbackmenu1(){ ?>
			<div id="menu">
				<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
			</div>
<?php }

function fallbackmenu2(){ ?>
			<div id="menu">
				<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
			</div>
<?php }

function add_more_buttons($buttons) {
 $buttons[] = 'hr';
 $buttons[] = 'del';
 $buttons[] = 'sub';
 $buttons[] = 'sup';
 $buttons[] = 'fontselect';
 $buttons[] = 'fontsizeselect';
 $buttons[] = 'cleanup';
 $buttons[] = 'styleselect';
 $buttons[] = 'lineheight';
 return $buttons;
}
add_filter("mce_buttons_3", "add_more_buttons");

function add_first_and_last($items) {
    $items[1]->classes[] = 'first-menu-item';
    $items[count($items)]->classes[] = 'last-menu-item';
    return $items;
}
 
add_filter('wp_nav_menu_objects', 'add_first_and_last');

// Theme Options
//include_once('admin/index.php');
//Metabox
//include_once('metaboxes.php');
include_once('inc/extra_function.php');
include_once('admin/admin_ajax.php');

function callback($buffer) {
    return $buffer;
}
function buffer_start() { ob_start("callback"); }
function buffer_end() { ob_end_flush(); }
add_action('init', 'buffer_start');
add_action('wp_footer', 'buffer_end');


// Enqueue Font Awesome 5 in WordPress 
function tme_load_font_awesome() {
    wp_enqueue_script( 'font-awesome-free', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js' );
}
add_action( 'wp_enqueue_scripts', 'tme_load_font_awesome' );


/* for javascript (only when using child theme) */
//wp_enqueue_script('url-script', home_url() );
//wp_localize_script('url-script', 'webpath', array('theme_path' => home_url()));



function create_invoices() {

    echo "Function Called";

    global $wpdb;
    $order_days = get_dates_of_month('10',22);
    $orderid = $_POST['orderid'];				
    $uid = $_POST['uid'];	
    $user_info = get_userdata( $uid);
    $args = array('p' => $orderid, 'post_type' => 'orders');

    $available_active_employee = get_users(
        array(
            'role' => 'personal',
            'meta_query' => array(
                array(
                    'key' => 'employee',
                    'value' => $uid,
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

    $total_emp =   count($available_active_employee);
    $order_total =  get_post_meta( $orderid, 'order_total', true );
    $company_days =  get_user_meta($uid ,'Company_days',true);   						   
    $order_week  =   get_post_meta( $orderid, 'order_week', true );	
    $lunch_benefit =  get_user_meta($uid ,'lunch_benefit',true);
    $lunch_benfit_type =  get_user_meta($uid ,'lunch_benfit_type',true);                                               
    $fixed_total = $order_total-$lunch_benefit;
    $order_total_price =  $order_total * $company_days  * $total_emp ;

    $method =  get_user_meta($uid, 'compnay_shipping_method', true );
    $shipping_cost = get_option('shipping_price');
    $vat_cost = get_option('vat_price');

    if($method == 'method_one')
        {  $shipping_cost = get_option('shipping_price'); }
    elseif($method == 'method_two')
    { $shipping_cost = get_option('shipping_price'); }
    else {
        { $shipping_cost = 0; }
    }

    $order_total = get_post_meta( $orderid, 'order_total',true); 
    $compnay_name =  get_user_meta($uid ,'compnay_name',true);  
    $compnay_number=  get_user_meta($uid ,'compnay_number',true);  

    $args = array(
        'post_type' => 'orders',
        'posts_per_page' => -1,
        'order' => 'desc',
    
        'meta_query' => array(   
            'relation' => 'AND',                                                            
                array(
                    'key'      => 'user_type',
                    'value'    => 'Company',
                    'compare'  => '='
                ),
                array(
                    'key'     => 'order_uid',
                    'value'   =>  $uid,
                    'compare' => '='
                ),
                array(
                    'key'     => 'order_day',			
                    'value' => $order_days,
                    'compare' => 'IN'
                )
        )    
    );   
    
    
    $order_price_arr = array();
    $order_type_arr = array();
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {   $query->the_post();															
            $order_total = get_post_meta( get_the_ID(), 'order_total', true );
            $order_type = get_post_meta( get_the_ID(), 'order_type', true );
            $order_price_arr[] = $order_total;
            $order_type_arr[] = $order_type;
            }  									
        }  														
        $total_order_price = array_sum($order_price_arr);
        $total_company_lunch = count($order_price_arr);            
        $total_order_type = array_count_values($order_type_arr);       
        $meeting_orders =  $total_order_type['Meeting'];
        $weekly_orders =  $total_order_type['Weekly'];
        $daily_orders = $total_order_type['Day']; 
    ?>


            
   <div class="invoice_table">
        <table class="invoice_slip_table">
                <thead>
                    <tr>
                        <th scope="col">Cloud</th>
                        <th scope="col">Distribution</th>
                    </tr>
                </thead>							
                <tbody>
                    <tr>
                        <td scope="row"><strong>Company : </strong><?php echo $compnay_name ?> <strong>No : </strong><?php echo $compnay_number ?></td>
                        <td scope="row"><strong>Email: </strong><?php echo $user_info->user_login ?></td>                        
                    </tr>
                    <tr>									
                        <td scope="row"><strong>Compnay Benfit: </strong></td>
                        <td scope="row"><strong> <?php echo  $lunch_benfit_type. " " . $lunch_benefit; ?></td>                       
                    </tr>
                    <tr>
                        <td scope="row"><strong>Total Compnay Lunch: </strong><?php echo $daily_orders ?></td>
                        <td scope="row"><strong>Total Lunch Fixed: </strong> <?php echo $weekly_orders?></td>                        
                    </tr>
                    <tr>									
                        <td scope="row"><strong>Total Meeting Food: </strong><?php echo $meeting_orders; ?></td>
                        <td scope="row"><strong>Total Employee: </strong><?php echo $total_emp; ?></td>                       
                    </tr>
                    
                    <tr>									
                        <td scope="row"><strong>Shipping Metode: </strong></td>
                        <td scope="row">
                            <?php  if($method == 'method_one')
                                    { echo "Metode 1"; echo " [Company Pay ". get_option('shipping_price') . "]";  }
                                    elseif($method == 'method_two')
                                    { echo "Metode 2"; echo " [Divided on all Employees]";  }
                                    else {
                                        { echo "Metode 3"; echo " [Pickup]";  }
                                    }?>
                        </td>                       
                </tr>
                </tbody>
            </table>
        <h5 class="mt-4">Summary</h5>
        <table class="invoice_slip_table">
            <thead>
                <th scope="col">Description</th>
                <th scope="col">Products</th>
                <th scope="col">VAT</th>										
                <th scope="col">Fordel</th>
                <th scope="col">Price</th>
            </thead>
            <tbody>            
                <?php   
                
                    $shipping_days_arr = array();
                    $total_price_arr = array();
                    $food_item_price__arr = array();
                    $food_item_vat__arr = array();
                    $food_item_benfit__arr = array();
                    $k = 0;                    
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {   $query->the_post(); $k++;	
                            $order_type = get_post_meta( get_the_ID(), 'order_type', true );
                            $weekid = get_post_meta( get_the_ID(), 'order_week', true ); 
                            $food_items =  get_post_meta( get_the_ID(), 'food_order', true );
                            $shipping_days_arr[] = $k;
                            foreach($food_items as $index => $food) {

                        ?> 
                                <tr>
                                        <td><strong><?php the_title() ?></strong><br/> <?php echo $order_type ?></td>
                                        <td><?php   foreach($food as $key => $ky_item) { 	?>
                                        <p>  <?php echo  get_the_title($key) . " [". $ky_item . "] " ; ?> NOK <?php $price = get_post_meta( $key, 'menu_item_price', true ); 
                                                echo $price   ?> </p>                                                                                                                        
                                    <?php 	}  ?>
                                        </td>
                                        <td>
                                            <?php  
                                            // Vat Details
                                            
                                            foreach($food as $key => $ky_item) { 																		
                                                    $price = get_post_meta( $key, 'menu_item_price', true ); 
                                                    $item_vat =  $price*15/100;																				
                                                    $item_total_vat = $item_vat*$ky_item; 																		
                                                    echo "<p> NOK ".$item_total_vat . "</p>";																																							
                                                    $food_item_vat__arr[] =  $item_total_vat; 																																				                                                                                                                                   
                                                                                                                                                                
                                                 }  ?>
                                        </td>
                                        
                                        <td>

                                        <?php   
                                                foreach($food as $key => $ky_item) { 
                                                    $price = get_post_meta( $key, 'menu_item_price', true ); 																			
                                                    $item_ben = ($price*10/100)*$ky_item; 	
                                                    echo "<p> NOK ".$item_ben . "</p>";	
                                                    $food_item_benfit__arr[] =  $item_ben ;																						                                                                                                                                      
                                                                                                                                                                
                                            }  ?>
                                        </td>	
                                        <td>																		
                                            <?php   																		
                                                foreach($food as $key => $ky_item) { 
                                                        $price = get_post_meta( $key, 'menu_item_price', true ); 	
                                                        $item_total_price = $price*$ky_item ;																		
                                                        echo "<p> NOK ".$item_total_price . "</p>";	
                                                        $food_item_price__arr[] =  $item_total_price ;
                                                    
                                                }  ?>
                                        </td>

                                            
                                                                                                    
                                </tr>

                        <?php   }   }  }

                        $shipping_days =  count($shipping_days_arr);
                        $food_item_vat_total = array_sum($food_item_vat__arr);											
                        $food_item_price_total = array_sum($food_item_price__arr);
                        $food_item_benfit_total = array_sum($food_item_benfit__arr);

                        $final_shipping = $shipping_days*$shipping_cost;
                        $shipping_vat = $final_shipping*25/100;
                        $ship_vat_total = $final_shipping+$shipping_vat;


                         $order_extra_total = $ship_vat_total+$final_order_price+$food_item_vat_total;
                         $invoice_price_with_emp = ($order_extra_total+$food_item_price_total)*$total_emp;
                        
                        
                        ?>  

                
                <tr>										
                    <td><strong>Item Total </strong> </td>
                    <td>Days [<?php echo $shipping_days ?>]</td>
                    <td>NOK  <?php echo $food_item_vat_total ?></td>
                    <td>NOK  <?php echo $food_item_benfit_total ?></td>	
                    <td>NOK <?php echo $food_item_price_total ?></td>										
                    
                </tr>

                <tr>										
                    <td>Shipping  </td>											
                    <td>NOK <?php echo $final_shipping; ?></td>
                    <td>VAT NOK <?php echo $shipping_vat ?> </td>
                    <td></td>
                    <td>NOK <?php echo $ship_vat_total; ?></td>
                    
                </tr>
                
            
                    <td scope="row"><strong>Total Grand : </strong></td>
                    <td></td>     
                    <td>NOK <?php echo $food_item_vat_total+$shipping_vat; ?></td>         
                    <td></td>                        
                    <td scope="row"> NOK <?php echo  $invoice_price_with_emp ?></td>
                
                </tr>
            <tbody>
            </table>
    </div>
<?php	
die;
}






function get_invoice_pay_direct($week,$year,$uid)
	{
							global $wpdb;								
							// $week = $_POST['week'];	
							// $year = $_POST['year'];	
							$inovice_week	= $week;	
							$inovice_year	= $year;
							$order_days = get_dates_of_week($inovice_week,$inovice_year);						
							$shipping_price = 90;
							$uid = $uid;
							$user_info = get_userdata( $uid);
							$args = array(
								'post_type' => 'orders',
								'posts_per_page' => -1,
								'order' => 'asc',							
								'meta_query' => array(   
									'relation' => 'AND',                                                            
										array(
											'key'      => 'user_type',
											'value'    => 'Personal',
											'compare'  => '='
										),
										array(
											'key'     => 'order_uid',
											'value'   =>  1,
											'compare' => '='
										),
										array(
											'key'     => 'order_day',			
											'value' => $order_days,
											'compare' => 'IN'
										)
								)    
							);  

							?>

				
						            
						   <div class="invoice_table">
								<table class="invoice_slip_table">
									<thead>
									<tr>
										<th scope="col">Cloud</th>
										<th scope="col">Distribution</th>
									</tr>
									</thead>							
									<tbody>
									<tr>
										<td scope="row"><strong>Name: </strong><?php echo $user_info->display_name; ?></td>
										<td scope="row"><strong>Uke: </strong><?php echo $inovice_week ?></td>										
									</tr>
									<tr>
										<td scope="row"><strong>Email: </strong><?php echo $user_info->user_login ?></td>
										<td scope="row"><strong>Shipping: </strong>NOK <?php echo $shipping_price?></td>
									</tr>
									
									</tbody>
								</table>
								
								<h5 class="mt-4">Summary</h5>
								<table class="invoice_slip_table">
									<thead>
									<th scope="col">Description</th>
									
									<th scope="col">Products</th>
									<th scope="col">VAT</th>
									<th scope="col">Price</th>
									</thead>
									<tbody>
									<?php 
									
										$shipping_days_arr = array();
                                        $food_item_day_arry = array();
                                        $food_total_vat_arr = array();
                                        $food_price_day_total_arr = array();	
                                        $loop = new WP_Query($args); while ( $loop->have_posts() ) : $loop->the_post();  global $post;                                             
                                                $order_day = get_post_meta( get_the_ID(), 'order_day', true );
                                                $order_type = get_post_meta( get_the_ID(), 'order_type', true );  
												$food_items =  get_post_meta( get_the_ID(), 'food_order', true );						
												foreach($food_items as $index => $food) {												
													$shipping_days_arr[] = $order_day;
													?>
														<tr>
														<td scope="row"><strong><?php echo $order_day ?> <br/><?php echo $order_type ?> </td>
																<td>
																<?php   
																
																$food_item_arr = array();
																$food_item_vat_arr = array();
																$food_item_price_arr = array();
																foreach($food as $key => $ky_item) { 
																		$menu_item_price =  get_post_meta( $key, 'menu_item_price', true );
																		$food_item_price_arr[] = $menu_item_price*$ky_item;
																		
																	?>	<p>  <?php echo  get_the_title($key) . " [". $ky_item . "] " ; ?> 
																		 NOK <?php echo $menu_item_price ?> </p>																	
																
																	<?php 	}  ?>
																	</td>
																	<td>
																		<?php foreach($food as $key => $ky_item) { 
																			$menu_item_price =  get_post_meta( $key, 'menu_item_price', true );
																			$item_vat =  $menu_item_price*15/100;	
																			$menu_item_price_vat = ($item_vat)*$ky_item;
																			$food_total_vat_arr[] =  $menu_item_price_vat;
																			$food_item_day_price =  array_sum($food_item_price_arr);																			
																			?>
																
																			<p>NOK <?php echo $menu_item_price_vat?> </p>
																
																	<?php 	}  ?>
																	</td>

																	<td>																
																		<p>NOK <?php 
																		
																		$food_price_day_total_arr[] = $food_item_day_price;
																		echo $food_item_day_price;?> </p>	
																	</td>
																
														</tr>

												<?php }  endwhile; 

											

													$shipping_days =  count($shipping_days_arr);
													$tatal_vat = array_sum($food_total_vat_arr);
													$shipping_cost =  $shipping_days* $shipping_price;
													$days_order_price =  array_sum($food_item_day_arry); 													
													$total_menus_days_price =  array_sum($food_price_day_total_arr); 

													$shipping_vat  = $shipping_cost*25/100; 
													$total_shipping  = $shipping_vat+$shipping_cost;
													$total_shipping_vat  = $shipping_vat+$shipping_cost+$tatal_vat;
													$grand_total =  $total_shipping_vat+$total_menus_days_price; 
												 
												 ?>
												<tr>
												<td scope="row"><strong>Item Total</td>
												<td scope="row"><strong></td>
												<td scope="row"><strong>NOK <?php echo $tatal_vat ?></td>
												<td scope="row"><strong>NOK <?php echo $total_menus_days_price ?></td>
												</tr>
												<tr>
												<td scope="row"><strong>Shipping</td>
												<td scope="row"><strong>Delivery Days [<?php echo $shipping_days ?>] </td>												
												
												<td scope="row">NOK <?php echo $shipping_vat?></td>
												<td scope="row"><strong>NOK <?php echo $shipping_cost ?></td>
												</tr>											
												
												<td scope="row"><strong>Grand Total</td>
												<td scope="row"><strong></td>
												<td scope="row"><strong>NOK <?php echo $total_shipping_vat?></td>
												<td scope="row"><strong>NOK <?php echo $grand_total ?></td>
												</tr>

										
									<tbody>
								</table>
							</div>
							
                      
                     

				 
						   
	

					<?php

						
																

						// check if order already placed by week
						$query_meta = array(
							'posts_per_page' => -1,
							'post_type' => 'invoice',
							'meta_query' => array(
								'relation' => 'AND',
								
								array(
									'key' => 'inovice_week',
									'value' => $inovice_week,
									'compare' => '='
								),
								array(
									'key' => 'inovice_year',
									'value' => $inovice_year,
									'compare' => '='
								),
								array(
									'key'     => 'user_type',
									'value' => 'Personal',
									'compare' => '='
								),
								array(
									'key'     => 'invoice_uid',
									'value' => $uid,
									'compare' => '='
								),
							)
						);	

						$postinweek = new WP_Query($query_meta);
						if ( $postinweek->have_posts() ): while ( $postinweek->have_posts() ): $postinweek->the_post();

						


					endwhile; wp_reset_query(); else : 
						$user_type = 'Personal';
						$post = array(
							'post_title'    => "INVP$uid-" . rand(10, 100),
							'post_status'   => 'publish',
							'post_type'     => 'invoice'			
						);
						$invoice_id = wp_insert_post($post);	
						add_post_meta($invoice_id, 'total_price', $grand_total, true);
						add_post_meta($invoice_id, 'invoice_days', $order_days, true);
						add_post_meta($invoice_id, 'order_status', 'Pending', true);
						add_post_meta($invoice_id, 'user_type', $user_type, true);
						add_post_meta($invoice_id, 'inovice_week', $inovice_week, true);
						add_post_meta($invoice_id, 'inovice_year',$inovice_year, true);
						add_post_meta($invoice_id, 'invoice_uid',$uid, true);
						
                        include(get_template_directory() . '/stripe/init.php');	
                        $stripe = new \Stripe\StripeClient('sk_test_51LzR9tB7gTQeC9cUuSk9M2d6UmOcDzbgZZLwW8zwQUSF4on9CIENpzRo1RtXjEWByNVj1sWxvotQbjP48LHYqXCc00HeF10taV');
                        $customers = $stripe->customers->all([
                            'limit' => 1,
                            'email' => $email,
                        ]);
                      
                        $customer = $customers['data'][0]['id'];                        
                        $create_payment = $stripe->charges->create([
                            'customer' => $customer, // replace with the actual customer ID
                            'amount' => intval($grand_total),
                            'currency' => 'NOK',
                            'description' => "Order Week : ".$inovice_week." Order Year :".$inovice_year
                        ]);
                        
                        //print_r($intent);
                        
                   
					    $status = $create_payment->status;
                        add_post_meta($invoice_id, 'invoice_status',$status, true);
                        add_post_meta($invoice_id, 'payment_message', $confirm_payment, true);

					//print_r($confirm_payment);


						



  




						


					endif;
					
					
					
					
					
					
					
					
					
					
					
					
				
	}


	


   






add_filter( 'cron_schedules', 'create_invoice_every_three_minutes' );
function create_invoice_every_three_minutes( $schedules ) {
    $schedules['every_three_minutes'] = array(
            'interval'  => 180,
            'display'   => __( 'Every 3 Minutes', 'ddd_translate' )
    );
    return $schedules;
}

// Schedule an action if it's not already scheduled
if ( ! wp_next_scheduled( 'create_invoice_every_three_minutes' ) ) {
    wp_schedule_event( time(), 'every_three_minutes', 'create_invoice_every_three_minutes' );
}

// Hook into that action that'll fire every three minutes
add_action( 'create_invoice_every_three_minutes', 'every_three_minutes_event_func' );
function every_three_minutes_event_func() {    
        $week_start = date('Y-m-d', strtotime("-7 days"));
        $wdate = $week_start;
        $week_date = new DateTime($wdate);
        $week = $week_date->format("W");
        $month = $week_date->format("m");
        $year = $week_date->format("y");
        $order_week = $week."-".$month."-".$year;   

        $order_args = array(
            'numberposts' => -1,
            'post_type'   => 'orders',
            'meta_query' => array(   
                'relation' => 'AND',                                                            
                    array(
                        'key'      => 'user_type',
                        'value'    => 'Personal',
                        'compare'  => '='
                    ),                    
                    array(
                        'key'     => 'order_week',
                        'value' => $order_week,
                        'compare' => 'IN'
                    )
            )   
        );      
        $latest_orders = get_posts( $order_args );    
        
        $author_arr = array();    
        foreach($latest_orders as $order)
        {
            $pid =  $order->ID;    
            $order_uid =  get_post_meta( $pid, 'order_uid', true );
            $author_arr[]  = $order_uid;
        }
        $authorlist = array_unique($author_arr);
        foreach($authorlist as $author){   
            get_invoice_pay_direct($week,$year,$author);
        }

   


   	
}



   










 
