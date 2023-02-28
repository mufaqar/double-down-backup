<?php query_posts(array(
                                        'post_type' => 'menu_items',
                                        'posts_per_page' => -1,
                                        'order' => 'desc',
                                        'menu_types' => 'lunch-boxes'                                                                     
                                        )); 
                                    if (have_posts()) :  while (have_posts()) : the_post(); $pid = get_the_ID(); ?>
                                                 <div class="col-md-6 col-lg-4 mt-4">
                                                    <div class="product_card p-4">
                                                        <?php if ( has_post_thumbnail() ) {
                                                               the_post_thumbnail('product-thumbnail' , array( 'class'  => 'pro_img' ));
                                                            } else { ?>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="Featured Thumbnail" />
                                                        <?php } ?>
                                                        <h2><?php the_title(); ?> , NOK <?php the_field('menu_item_price'); ?> </h2>
                                                        <button  id="<?php echo get_the_ID()?>" class="btn_primary  select_product_btn id<?php echo get_the_ID();?>"
                                                        onmouseover="showCounter(<?php echo get_the_ID();;?>)">Velg </button>
                                                        <div class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid<?php echo get_the_ID();?>">
                                                            <i class="count-down" onclick="handleCountDec(<?php echo get_the_ID(); ?>)"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                                    alt="" ></i>
                                                            <input type="text"  data-id="<?php echo $pid;?>" value="1" 
                                                                class="product-quantity form-control text-center incrDecrCounter" />
                                                            <i class="count-up" onclick="handleCountInc(<?php echo get_the_ID(); ?>)"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                                    alt="" ></i>
                                                        </div>
                                                </div>
                                            </div>
                            <?php endwhile; wp_reset_query(); else : ?>
                            <h2><?php _e('Ingenting funnet','ddd_translate'); ?></h2>
                            <?php endif; ?>