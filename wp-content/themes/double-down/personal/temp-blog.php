<?php
 /*  Template Name:  Blog (P) */

get_header(''); ?>
  <?php include('navigation.php');  ?>    
               
        <div class='blogs_wrapper mt-4'>
            <div class='blogs'>
                <h2><?php the_title()?></h2>
                <div class="row">
                    <?php global $paged;
                        query_posts(array(
                        'posts_per_page' => -1,
                        'paged' => $paged
                        ));   ?>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>                              
                                    <div class="blog_wrapper col-md-6 col-lg-4 col-xl-3" id="post-<?php the_ID(); ?>">
                                            <div class="blog p-2 bg-body">                       
                                            <a href="<?php the_permalink() ?>">   <?php if ( has_post_thumbnail() ) {
                                                the_post_thumbnail('full', array('class' => 'feature_img w-100'));
                                            } else { ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/blog_img.png" alt="Featured Thumbnail" class="feature_img w-100" />
                                                <?php } ?></a>
                                                <h3 class="heading mt-2"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                                <p class="short_info"> <?php  echo strip_shortcodes(wp_trim_words( get_the_content(), 40 )); ?></p>
                                                <h6 class="author mt-2">Written by <?php echo get_the_author(); ?> </h6>
                                            </div>
                                    </div>   
                        <?php endwhile; ?>        
                    <?php else : ?>
                        <p class="noposts"><?php _e('To add Blog Posts, go to Admin Panel > Posts > Add New','ddd_translate'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="d-none load_more d-flex justify-content-center mt-5 mb-5">
                    <a href="" class="d-flex align-items-center">
                        <p>Load More</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/reources/images/right-arrow.png" alt="">
                    </a>
                </div>



   
                </div>
            </div>
        </div>
        
    </main>


<?php //get_sidebar('blog'); ?>
<?php get_footer(); ?>