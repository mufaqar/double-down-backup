 <?php

$query_week =  $_REQUEST['week'];
$data = $query_week;    
$whatIWant = substr($data, strpos($data, "-") + 1);    
$q_week = $whatIWant;
$query_week = $q_week."-10-22";
$weeks= date("W-m-y"); 
if($query_week == "")
{    $query_week = $weeks;
}
else
{
    $query_week = $query_week;
}

$today = date("Y-m-d", strtotime('today'));


echo "<h2>Order for " . $today . "</h2>";


?>
                
                <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Order ID</th>
                            <th>Compnay Name</th>
                            <th>Address</th>
                            <th>Order Date</th>                      
                            <th>Price</th>
                            <th>Status</th>
                            <th>PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                 
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
                        
                                $pid = get_the_ID();
                                $order_uid = get_post_meta(get_the_ID(), 'order_uid', true);
                                $user_info = get_userdata($order_uid);                    
                                $food_items =  get_post_meta( get_the_ID(), 'food_order', true );	
                                $compnay_delivery_address =  get_user_meta( $order_uid, 'compnay_delivery_address', true );	$i++; ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php the_title() ?><br/><?php echo get_post_meta(get_the_ID(), 'order_type', true); ?></td>                                   
                                    <td><?php echo $user_info->user_login ?></td> 
                                    <td><?php echo $compnay_delivery_address ?></td>  
                                    <td><?php echo get_post_meta(get_the_ID(), 'order_day', true); ?></td>
                                    <td>NOK <?php echo get_post_meta(get_the_ID(), 'order_total', true); ?></td>                                                              
                                    <td><span class="status <?php echo get_post_meta(get_the_ID(), 'order_status', true); ?>"><?php echo get_post_meta(get_the_ID(), 'order_status', true); ?> </span> </td>
                                    <!-- <td><button data-id="<?php echo $pid;?>" class="download_pdf btn_primary"> PDF</button> </td> -->
                                    <td><a target="_blank" data-id="<?php echo $pid;?>" href="<?php echo home_url('download-invoice'); ?>/?order_id=<?php echo $pid;?>" class="download_pdf btn_primary"> PDF</a> </td>
                                </tr>
                            <?php endwhile;
                            wp_reset_query();
                        else : ?>
                            <h2><?php _e('Nothing Found', 'ddd_translate'); ?></h2>
                        <?php endif; ?>

                    </tbody>
