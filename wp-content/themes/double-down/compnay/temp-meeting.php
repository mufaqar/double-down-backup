<?php /* Template Name: Meeting (C)  */
get_header('company');
global $current_user;
wp_get_current_user();
$uid =  get_current_user_id() ;





?>
<?php include('navigation.php'); ?>
<div class="custom_container order_wrapper mt-5 mb-5">
    <form class="addmeeting" id="addmeeting" action="#">
        <div class="_inner mt-4 p-5">
            <div class="date_filter d-flex justify-content-center flex-column align-items-center">
            <div class="row">
                    <div class="col">
                    <label>Velg dato</label>
                         <input type="date" id="date" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div class="col"> <label>Velg leveringstid</label>
                    <input type="time"  value="" placeholder="02-05-22" id="time">
                    </div>
                </div>
                
                <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                <input type="hidden" value="<?php echo date("W"); ?>" id="weekid" >
            </div>
            <div class="_content mt-5 mb-5">
              
                <div class="row">
                    <?php query_posts(array(
                        'post_type' => 'meeting_food',
                        'posts_per_page' => -1,
                        'order' => 'desc'
                    ));
                    if (have_posts()) :  while (have_posts()) : the_post();
                            $pid = get_the_ID(); ?>
                            <div class="col-md-6">
                                <div class="order_product">                                    
                                    <?php if ( has_post_thumbnail() ) {
                                                               the_post_thumbnail('meeting-thumbnail' , array( 'class'  => 'w-100 meeting_img' ));
                                                            } else { ?>
                                                    <img src="<?php bloginfo('template_directory'); ?>/reources//images/order-pic-1.png" alt="" class="w-100">
                                                        <?php } ?>
                                    <h3><?php the_title(); ?><span> | NOK <?php the_field('menu_item_price'); ?> </span></h3>
                                    <p><?php the_content()?>  </p>
                                    <button class="btn_primary  id<?php echo $pid; ?>" onmouseover="showCounter(<?php echo $pid; ?>)">Velg </button>
                                    <div class="d-none product_counter mt-4 d-flex justify-content-center align-items-center cid<?php echo $pid; ?>">                                   
                                        <i class="count-down" onclick="handleCountDec(<?php echo get_the_ID(); ?>)">
                                        <img src="<?php echo get_template_directory_uri(); ?>/reources/images/minus-thin.png"  alt="" ></i>
                                        <input type="text" data-id="<?php echo $pid; ?>" value="0" class="product-quantity form-control text-center incrDecrCounter" />
                                        <i class="count-up" onclick="handleCountInc(<?php echo get_the_ID(); ?>)">
                                        <img  src="<?php echo get_template_directory_uri(); ?>/reources/images/plus-thin.png" alt="" ></i>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_query();
                    else : ?>
                        <h2><?php _e('Ingenting funnet', 'ddd_translate'); ?></h2>
                    <?php endif; ?>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h6 class="mt-2"><strong>Leveringsadresse</strong></h6>
                    <p><?php echo get_user_meta( $uid, 'compnay_delivery_address', true ); ?></p>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-end">
                    <button class="btn green_btn">Bestill nå</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

</div>
</div>
</div>

</main>

<section class="hideme overlay">
    <div class="popup">
        <div class="popup_wrapper">
            <div class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo">

                <div class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                    <div class="content mt-5">
                        <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                        <h1 class="finished">Finished!</h1>
                        <h2 class="mb-5 mt-5">Your order has beed submitted!</h2>
                        <a href="<?php echo home_url('/company-profile/orders'); ?>" class="btn_primary mb-5">View Orders</a>
                    </div>
                </div>

            </div>
            <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
        </div>
    </div>
</section>



<?php get_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

    





    jQuery(document).ready(function($) {

     
        $('._cross').click(function() {

            $(".hideme").css("display", "none");
        });

        $("#addmeeting").submit(function(e) {
            e.preventDefault();
            var date = jQuery('#date').val();
            var uid = jQuery('#uid').val();
            var time = jQuery('#time').val();  
            var weekid = jQuery('#weekid').val();   

            
            var datas = [];
            var newdata = [];
            $("#addmeeting .product-quantity").each(function() {
                var productid = $(this).data('id');
                var value = $(this).val();
                if (value > 0) {
                    datas.push([productid, $(this).val()]);
                }
                newdata.push(datas);
            });
            //alert(newdata[0]);
            var menu_items = newdata[0];
            console.log(menu_items);

            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "addmeeting",
                    menu_items: menu_items,
                    date: date,
                    uid: uid,
                    time : time,
                    weekid : weekid,
                    order: "Company"
                },
                success: function(data) {

                    if (data.code == 0) {
                        alert(data.message);
                    } else {
                        $(".overlay").css("display", "flex");
                        // alert(data.message);

                    }
                }

            });
        });


    });
</script>