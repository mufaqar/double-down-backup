                <div class="food_info day__food row">
                    <?php query_posts(array(
                        'post_type' => 'menu_items',
                        'posts_per_page' => -1,
                        'order' => 'desc',
                        'menu_types' => 'lunch-boxes'
                    ));
                    if (have_posts()) :  while (have_posts()) : the_post(); $new_id = get_the_ID().$this_day; ?>
                            <div class="col-md-6 first border-end mb-5">
                                <h3><?php the_title() ?> | <span> NOK <?php the_field('menu_item_price'); ?></span></h3>
                                <p>Here you can easily choose between or cancel
                                    the various lunch options from day to day.
                                    If you want to change a fixed subscription,
                                    do so <a href="<?php echo home_url('contact-us'); ?>">her.</a></p>
                                <div class="order_wrapper mt-3">                                 
                                    <button class="btn_primary _id<?php echo $new_id ?>" onmouseover="showOrderCounter(<?php echo $new_id?>)">Velg </button>
                                    <div class="d-none product_counter  d-flex justify-content-center align-items-center _cid<?php echo get_the_ID() ?>">
                                        <i class="count-down"><img src="<?php bloginfo('template_directory'); ?>/reources/images/minus-thin.png" alt="" onclick="handleCountDec(<?php echo get_the_ID() ?>)"></i>
                                        <input type="text" data-id="<?php echo get_the_ID(); ?>" value="0" class="product-quantity form-control text-center incrDecrCounter" />
                                        <i class="count-up"><img src="<?php bloginfo('template_directory'); ?>/reources/images/plus-thin.png" alt="" onclick="handleCountInc(<?php echo get_the_ID() ?>)"></i>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_query();  else : ?>
                        <h2><?php _e('Nothing Found', 'ddd_translate'); ?></h2>
                    <?php endif; ?>
                </div>


                <div class="d-flex justify-content-between mt-5 mb-4 accessories">
                   <h2 class="mt-4"><span style="color: #5FB227">2 -</span> Additionals</h2>
                </div>
                <div class="product_wrapper row mb-4">
                    <?php query_posts(array(
                        'post_type' => 'menu_items',
                        'posts_per_page' => -1,
                        'order' => 'desc',
                        'menu_types' => 'additionals'
                    ));
                    if (have_posts()) :  while (have_posts()) : the_post(); ?>
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

                        <?php endwhile;
                        wp_reset_query();  else : ?>
                        <h2><?php _e('Nothing Found', 'ddd_translate'); ?></h2>
                    <?php endif; ?>

                </div>

  
 

    <div class="accordion_btns d-flex justify-content-end mb-5 mr-3">
      
        <input type="submit" class="btn_primary" value="Save" />
    </div>