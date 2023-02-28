    <?php /* Template Name: Admin-Payments  */



    get_header('admin');


    ?>
    <?php include('navigation.php'); ?>
    <div class="admin_parrent">
        <div class="toggle_btn">
            <div class="row ">
                <div class="catering_wrapper mt-5 mb-2  p-0 w-100">
                    <div class="catering_menu buttons">
                        <a id="1" class="showSingle _active" target="1" data="">Alle</a>
                        <a id="2" class="showSingle" target="2" data="Complete">Fullført</a>
                        <a id="3" class="showSingle" target="3" data="Pending">Avventer</a>
                        <a id="4" class="showSingle" target="4" data="Cancel">Kansellert</a>
                    </div>
                </div>
            </div>
        </div>
        <section id="div1" class="targetDiv activediv tablediv">
            <table id="payments" class="table table-striped orders_table" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr #</th>   
                        <th>Navn</th>
                        <th>Kontodetaljer</th>
                        <th>Bedrift</th>
                        <th>Siste betaling</th>
                        <th>Epost status</th>
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
                            $i++;

                            
                            $order_uid = get_post_meta(get_the_ID(), 'order_uid', true)
                            
                            ?>
                            <tr>
                               <td><?php echo $i?></td>
                                <td class="d-flex align-items-center"><img class="_user_profile" src="<?php echo esc_url( get_avatar_url( $order_uid ) ); ?>" alt="profile" /><?php the_title() ?></td>
                                <td><div class="account_detils"><?php echo get_post_meta(get_the_ID(), 'order_type', true); ?></div></td>
                                <td><?php echo get_post_meta(get_the_ID(), 'user_type', true); ?></td>
                             
                                <td>NOK <?php echo get_post_meta(get_the_ID(), 'total_price', true); ?></td>
                                <td> <span class="payment_status <?php echo get_post_meta(get_the_ID(), 'order_status', true); ?> "><?php echo get_post_meta(get_the_ID(), 'order_status', true); ?> </span> </td>
                            </tr>
                        <?php endwhile;
                        wp_reset_query();
                    else : ?>
                    
                    <?php endif; ?>

                </tbody>

            </table>

        </section>
    </div>



<?php get_footer('admin') ?>