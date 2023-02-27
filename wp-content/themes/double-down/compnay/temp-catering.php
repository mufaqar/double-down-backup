    <?php /* Template Name: Company-CateringOrders  */
    get_header('company');
    $q_date  = $_GET['qdate'];





    ?>
    <?php include('navigation.php'); ?>
    <div class="custom_container catering_wrapper mt-5 mb-5">
        <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
            <div class="catering_heading d-flex align-items-center">
                <h2>Catering</h2>
                <div><a href="<?php echo home_url('catering-form'); ?>"><i class="fa-solid fa-plus"></i></a></div>
            </div>
            <div class="calender">
                <form class="showresult" id="showresult" action="">
                    <input type="date" value="" name="qdate" onchange="this.form.submit()">
                    <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                </form>


            </div>
        </div>
        <div class="catering_card_wrapper">

            <?php
            global $current_user;
            wp_get_current_user();

            if ($q_date == '') {
                query_posts(array(
                    'post_type' => 'catering',
                    'posts_per_page' => -1,
                    'order' => 'desc',
                    'author' => $current_user->ID

                ));
            } else {

                query_posts(array(
                    'post_type' => 'catering',
                    'posts_per_page' => -1,
                    'order' => 'desc',
                    'author' => $current_user->ID,
                    'meta_key'         => 'date',
                    'meta_value'       => $q_date

                ));
            }





            if (have_posts()) :  while (have_posts()) : the_post(); ?>
                    <div class="catering_card">
                        <?php
                        $date =  get_field('date');
                        $timestamp = strtotime($date);
                        $day = date('l', $timestamp);
                        ?>
                        <h3><?php echo $day; ?> | <span><?php the_title() ?></span></h3>
                        <div class="d-flex justify-content-between flex-wrap mt-4">
                            <div class="">
                                <h6>Number of people:</h6>
                                <p><?php the_field('people'); ?> </p>
                            </div>
                            <div class="">
                                <h6>Address:</h6>
                                <p><?php the_field('address'); ?> </p>
                            </div>
                            <div class="">
                                <h6>Food Type:</h6>
                                <?php echo get_the_terms($post->ID, 'food_type')[0]->name; ?>
                            </div>
                            <div class="">
                                <h6>Budget per person:</h6>
                                <p>NOK <?php the_field('person'); ?></p>
                            </div>
                            <div class="">
                                <h6>Need allergens</h6>
                                <p> <?php echo get_the_terms($post->ID, 'allergens')[0]->name; ?></p>
                            </div>
                        </div>
                    </div>


                <?php endwhile;
                wp_reset_query();
            else : ?>
                <h2><?php _e('Nothing Found', 'ddd_translate'); ?></h2>
            <?php endif; ?>




        </div>

    </div>


    </div>
    </div>
    </div>

    </main>

    <?php get_footer(); ?>