                <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Products</th>  
                            <th>Allergenes</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $i = 0;
                        query_posts(array(
                            'post_type' => 'orders',
                            'posts_per_page' => -1,
                            'order' => 'desc',
                        ));

                        if (have_posts()) :  while (have_posts()) : the_post();

                        $order_uid = get_post_meta(get_the_ID(), 'order_uid', true);
                        $user_info = get_userdata($order_uid);
                 
                        $food_items =  get_post_meta( get_the_ID(), 'food_order', true );		
                       
                      
                                $i++; ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php the_title() ?><br/><?php echo get_post_meta( get_the_ID(), 'order_type', true );?></td>
                                    <td><?php echo get_post_meta( get_the_ID(), 'order_day', true );?></td>    
                                    <td><?php echo $user_info->user_login ?></td>  
                                    <td>
                                        <ul>

                                    <?php

                                    foreach($food_items as $index => $food){
                                        ?>

                                            <li>
                                              
                                                <?php   foreach($food as $key => $ky_item) { 	?>
                                                    <p>
                                                        <?php echo  get_the_title($key) . " [". $ky_item . "] " ; ?>
                                                       
                                                        <p>
                                                
                                                    <?php 	}  ?>
                                                   
                                               
                                          
                                                   
                                             
																
                                                </li>

                                        <?php


                                    }



                                    ?> </ul>
                                    </td>  
                                    <td></td>   
                                                         
                                    <td>NOK <?php echo get_post_meta(get_the_ID(), 'order_total', true); ?></td>
                                    <td><span class="status <?php echo get_post_meta(get_the_ID(), 'order_status', true); ?>"><?php echo get_post_meta(get_the_ID(), 'order_status', true); ?> </span> </td>
                                </tr>
                            <?php endwhile;
                            wp_reset_query();
                        else : ?>
                            <h2><?php _e('Nothing Found', 'ddd_translate'); ?></h2>
                        <?php endif; ?>

                    </tbody>
