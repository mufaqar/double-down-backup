
    <div class="custom_container catering_wrapper mt-5 mb-5">
                         <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                                <div class="catering_heading d-flex align-items-center">
                                    <h2>Lunsjbestillinger</h2>                                
                                </div>                       
                        </div>
                        <div class="catering_card_wrapper">
                            <div class="invoice_table">
                                <table class="_table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Bestillings ID</th>                                  
                                        <th scope="col">Type</th>
                                        <th scope="col">Uke</th>
                                        <th scope="col">Varepris</th>
                                        <th scope="col">Ansatte</th>
                                        <th scope="col">Fordel</th>
                                        <th scope="col">Dager</th>
                                        <th scope="col">Bedriftslønn</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                
                                        <?php 
                                            global $current_user;
                                            wp_get_current_user();
                                           $uid =  $current_user->ID;
                                            query_posts(array(
                                                    'post_type' => 'orders',
                                                    'posts_per_page' => -1,
                                                    'order' => 'desc',                                               
                                                    'meta_query' => array(                                                      
                                                        
                                                        'relation' => 'AND',
                                                            array(
                                                                'key'   => 'order_type',
                                                                'value' => 'Meeting',
                                                                'compare' => '!='
                                                            ),
                                                            array(
                                                                'key'     => 'user_type',
                                                                'value' => 'Company',
                                                                'compare' => '=',
                                                            ),
                                                            array(
                                                                'key'     => 'order_uid',
                                                                'value' => $current_user->ID,
                                                                'compare' => '='
                                                            )
                                                    )
                                                    
                                                ));              
                                        
                                                if (have_posts()) :  while (have_posts()) : the_post(); 

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

                                               // print_r($available_active_employee);
                                               $total_emp =   count($available_active_employee);
                                               $order_total =  get_post_meta( get_the_ID(), 'order_total', true );
                                               $company_days =  get_user_meta($uid ,'Company_days',true);                                            

                                               $lunch_benefit =  get_user_meta($uid ,'lunch_benefit',true);
                                               $lunch_benfit_type =  get_user_meta($uid ,'lunch_benfit_type',true);                                               
                                            //    $fixed_total = $order_total-$lunch_benefit;
                                            //    $order_total_price =  $order_total * $company_days  * $total_emp ;
                                            //     $fix_remaing =  $fixed_total * $company_days  * $total_emp ;
                                            //     if($lunch_benfit_type == '%')
                                            //     {
                                            //         $company_pay = $lunch_benefit /100 * $order_total_price;
                                            //     }
                                            //     else{
                                            //         $company_pay = $order_total_price - $fix_remaing;
                                            //     }

                                          

                                               
                                               
                                                
                                                
                                                
                                                
                                                ?>
                                                               
                                                                <tr>
                                                                        <td scope="row"><?php the_title()?></td>
                                                                  
                                                                        <td><?php echo get_post_meta( get_the_ID(), 'order_type', true ); ?></td>
                                                                        <td><?php echo get_post_meta( get_the_ID(), 'order_week', true ); ?></td>
                                                                        <td>NOK <?php echo get_post_meta( get_the_ID(), 'order_total', true ); ?></td>
                                                                        
                                                                        <td><?php echo $total_emp; ?></td>
                                                                        <td><?php echo $lunch_benefit. "" . $lunch_benfit_type; ?></td>
                                                                        <td><?php echo $company_days; ?></td>
                                                                        <td>NOK <?php echo $company_pay; ?></td>
                                                                        <td>NOK <?php echo $order_total_price ?> </td>
                                                                        </tr>
                                            <?php endwhile; wp_reset_query(); else : ?>
                                                    <h2><?php _e('Ingenting funnet','ddd_translate'); ?></h2>
                                                <?php endif; ?>  
                                        
                                        
                                    </tbody>
                                </table>
                            </div>                

                        </div>
                
   </div>

                        

