<?php 
global $current_user;
wp_get_current_user();
$user_info = get_userdata( $current_user->ID);
//print_r($user_info);




    ?>

        <div class="popup_wrapper">
                <h3 class="ad_productss">Invoice Detail</h3>                
                <div class="invoice_table">
                  <table class="invoice_slip_table">
                    <thead>
                      <tr>
                        <th scope="col">Cloud</th>
                        <th scope="col">Distribution</th>
                      </tr>
                    </thead>
                    <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                    <tbody>
                      <tr>
                        <td scope="row"><strong>Name: </strong><?php echo $user_info->display_name; ?></td>
                        <td scope="row"><strong>Lunch: </strong>NOK <?php echo get_post_meta( get_the_ID(), 'order_total', true ); ?></td>
                        
                      </tr>
                      <tr>
                        <td scope="row"><strong>Email: </strong><?php echo $current_user->user_login ?></td>
                        <td scope="row"><strong>Shipping: </strong>NOK 0</td>
                      </tr>
                    </tbody>
                  </table>

           

                  <h5 class="mt-4">Summary</h5>
                  <table class="invoice_slip_table">
                    <thead>
                    <th scope="col">Description</th>
                    <th scope="col">Number</th>
                    </thead>
                    <tbody>
                    <?php   $food_items =  get_post_meta( get_the_ID(), 'food_order', true );

                   // print "<pre>";
                    //print_r($food_items);
                    
                    foreach($food_items as $index => $food) { 
                        
                   
                        ?>

                          
                           
                            <tr>
                            <td scope="row"><strong><?php echo $index ?></td>
                            <td>
                            <?php   foreach($food as $key => $ky_item) { 

                                $produc

                                ?>
                                   <p>  <?php echo  get_the_title($key) . " [". $ky_item . "] " ; ?> </p>
                                <?php


                             }  ?>
                             </td>


                        
                      </tr>
                       



                     <?php }

                    ?>
                    
                 
                      
                    
                    <tbody>
                  
                      
                     

                   
                     

                    </tbody>
                    <?php endwhile; wp_reset_query(); else : ?>
                                                    <h2><?php _e('Ingenting funnet','ddd_translate'); ?></h2>
                                                <?php endif; ?>  
                  </table>

                  <!-- <h5 class="mt-4">Invoice Lines</h5>
                  <table class="invoice_slip_table">
                    <thead>
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Total</th>
                        <th scope="col">Shipping</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row">Monday, May 23, 2022</td>
                        <td scope="row">Salad x 1</td>
                        <td scope="row">kr 72.8,-	</td>
                        <td scope="row">kr 0,-</td>
                        <td scope="row">Complete</td>
                      </tr>
                      <tr>
                        <td scope="row">Tuesday, May 24, 2022</td>
                        <td scope="row">Salad x 1</td>
                        <td scope="row">kr 72.8,-	</td>
                        <td scope="row">kr 0,-</td>
                        <td scope="row">Pending</td>
                      </tr>
                      <tr>
                        <td scope="row">Tuesday, May 24, 2022</td>
                        <td scope="row">Salad x 1</td>
                        <td scope="row">kr 72.8,-	</td>
                        <td scope="row">kr 0,-</td>
                        <td scope="row">Pending</td>
                      </tr>
                     
                    </tbody>
                  </table> -->

                  <div class="mt-4 d-flex justify-content-end">
                    <p>*Alle priser ink. 15% Mva</p>
                  </div>

                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>