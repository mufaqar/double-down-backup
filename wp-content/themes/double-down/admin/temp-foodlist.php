<?php /* Template Name: Admin-Foodlist  */



get_header('admin');


?>
<?php include('navigation.php'); ?>
<div class="admin_parrent _admin_foodlist">
    <div class="toggle_btn">
        <div class="row ">
            <div class="catering_wrapper mt-5 mb-2  p-0 w-100">
            <div class="catering_heading d-flex align-items-center">
                                <h2>Produktliste</h2>
                                <div><a href="<?php echo home_url('admin/add-food-list'); ?>"><i class="fa-solid fa-plus"></i></a></div>
                            </div>
            </div>
        </div>
    </div>


    <section id="div1" class="targetDiv activediv tablediv">     
        <table id="cancle" class="table table-striped orders_table" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produktnavn</th>
                    <th>Produktkategori</th>
                    <th>Underkategori</th>
                    <th>Dato</th>
                    <th>Pris</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;

                query_posts(array(
                    'post_type' => 'menu_items',
                    'posts_per_page' => -1,
                    'order' => 'desc',


                ));

                if (have_posts()) :  while (have_posts()) : the_post();
                        $i++; ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php the_title() ?></td>
                            <td><?php $types_list = wp_get_post_terms( $post->ID, 'menu_types', array( 'fields' => 'all' ) );
                            foreach($types_list as $type)
                            {
                                  echo $type->name . "<br/> ";

                                
                            } ?></td>
                            <td><?php $sub_types_list = wp_get_post_terms( $post->ID, 'menu_sub_types', array( 'fields' => 'all' ) );
                            foreach($sub_types_list as $subtype)
                            {
                                  echo $subtype->name . " ";

                                
                            } ?></td>
                            <td><?php $date = get_field('date'); echo date("d-m-Y", strtotime($date));?></td>
                            <td>NOK <?php echo get_post_meta(get_the_ID(), 'menu_item_price', true); ?></td>
                            <td> 

                            <?php if ( has_post_thumbnail() ) {
									the_post_thumbnail( array(50,50),array('class' => 'p_image') );
								} else { ?>
							<img   class="p_image" src="<?php bloginfo('template_directory'); ?>/reources/images/food1.png" alt="Featured Thumbnail" />
							<?php } ?>
                        
                        
                        
                        </td>
                        </tr>
                    <?php endwhile;
                    wp_reset_query();
                else : ?>
                    <h2><?php _e('Ingenting funnet', 'ddd_translate'); ?></h2>
                <?php endif; ?>

            </tbody>

        </table>

    </section>
</div>


</div>
</div>
</div>
</div>

</main>

<?php get_footer('admin') ?>