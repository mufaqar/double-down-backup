<div class="custom_container catering_wrapper mt-5 mb-5">
                 <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                        <div class="catering_heading d-flex align-items-center">
                        <h2><?php _e('Møtematbestillinger','ddd_translate'); ?></h2>                           
                        </div>                     
                        </div>
                        <div class="catering_card_wrapper">
                            <div class="invoice_table">
                                <table class="_table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Bestillings ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Total pris</th>
                                        <th scope="col">Brukertype</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                
                                        <?php 
                                            global $current_user;
                                            wp_get_current_user();
                                            query_posts(array(
                                                    'post_type' => 'orders',
                                                    'posts_per_page' => -1,
                                                    'order' => 'desc',
                                                    'author' => $current_user->ID,
                                                    'meta_query' => array(
                                                        
                                                        'relation' => 'AND',
                                                            array(
                                                                'key'   => 'order_type',
                                                                'value' => 'Meeting',
                                                                'compare' => '=',
                                                            ),
                                                            array(
                                                                'key'     => 'user_type',
                                                                'value' => 'Personal',
                                                                'compare' => '=',
                                                             
                                                            ),
                                                    )
                                                    
                                                ));              
                                        
                                                if (have_posts()) :  while (have_posts()) : the_post(); ?>
                                                                <tr>
                                                                        <td scope="row"><?php the_title()?></td>
                                                                        <td><?php echo get_post_meta( get_the_ID(), 'date', true ); ?></td>
                                                                        <td>NOK <?php echo get_post_meta( get_the_ID(), 'order_total', true ); ?></td>
                                                                        <td><?php echo get_post_meta( get_the_ID(), 'user_type', true ); ?></td>
                                                                        <td><?php echo get_post_meta( get_the_ID(), 'order_status', true ); ?> <i class="fa-solid fa-down-to-line"></i></td>
                                                                        </tr>
                                            <?php endwhile; wp_reset_query(); else : ?>
                                                <tr>   
                                                <td colspan="5"> <h2><?php _e('Ingenting funnet','ddd_translate'); ?></h2></td>
                                                </tr>
                                                <?php endif; ?>  
                                        
                                        
                                    </tbody>
                                </table>
                            </div>                

                        </div>
                
                            </div>
                </div>
                        

