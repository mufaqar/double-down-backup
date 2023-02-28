<?php /* Template Name: Company-Dashoard  */
get_header('company');
global $current_user;
wp_get_current_user();
$uid = $current_user->ID;
include 'navigation.php';
$query_date = $_REQUEST['date'];
$today_date = date("Y-m-d");

if ($query_date == '' ) {
    $query_date = $today_date;
} 
 else {
    $query_date = $query_date;
}



?>
      <div class="tab_wrapper">
                     <?php page_title()?>
                            <div class='panels'>
                                <div class='panel launchClander'>
                                    <div class="calender_wrapper d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center __btn">
                                            <a href="<?php echo home_url('/company-profile/lunch-calendar'); ?>" class="btn_primary d-flex align-items-center">
                                                <i class="fa-solid fa-fork-knife"></i>
                                                <p style="margin-left: .5rem; color:white">Selskapslunsj</p>
                                            </a>
                                            <a  href="<?php echo home_url('/company-profile/orders'); ?>"  class="btn_primary btn_sec d-flex align-items-center">
                                                <i class="fa-solid fa-newspaper"></i>
                                                <p style="margin-left: .5rem; color:#5FB227">Mine ordrer</p>
                                            </a>
                                        </div>
                                        <div class="info d-flex align-items-center">
                                            <h6><?php echo get_user_meta($uid, 'compnay_delivery_address', true); ?> | <span>faste  <?php echo get_user_meta($uid, 'Company_days', true); ?> dager i uken</span></h6>
                                            <!-- <div class="calender week_calender">
                                                <input type="text" id="weekPicker2" value="<?php echo date("Y-W"); ?>">
                                                <div class="wc-icon"><i class="fa-solid fa-calendar-days"></i></div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="accordion_wrapper">
                                        <div class="calender_wrapper">
                                            <div class="row">
                                            <div class="col-md-10">
                                            <h2>Faste leveringer <span><?php echo $query_date ?></span> </h2>
                                            </div>
                                            <div class="col-md-2">
                                            <div class="calender">
                                                    <form action="" method="POST" id="dateform">
                                                    <input type="hidden" id="send" name="send" />
                                                        <input type="date"  min="<?php echo date("Y-m-d"); ?>"  name="date" value="<?php if ($query_date == '') {echo date("Y-m-d");} else {
                                                                echo $query_date;
                                                            }
                                                            ?>" id="date">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                         <?php get_template_part('partials/company', 'calfixed');?>
                                        
                                    </div>

                                    <h2>Lunsjbestillinger <span><?php echo $query_date ?></span> </h2>
                                    <?php get_template_part('partials/company', 'calorders');?>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        </div>
    </main>

    <section class="hideme alertmessage">
        <div class="popup">
            <div class="popup_wrapper">
                <div
                    class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                    <img src="<?php bloginfo('template_directory');?>/reources/images/logo.png" class="logo" alt="logo">

                    <div
                        class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                        <div class="content mt-5">
                            <div class="right"><img src="<?php bloginfo('template_directory');?>/reources/images/img 3.png" alt=""></div>
                            <h1 class="finished">Finished!</h1>
                            <h2 class="mb-5 mt-5">Your order has beed deleted !</h2>
                        </div>
                    </div>

                </div>
                <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section>


    <?php get_footer();?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/script.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


 <script type="text/javascript">
     jQuery(document).ready(function($)
        {

            $('#date').change(function() {
                  $(this).closest('form').submit();
             });          

            $('._cross').click(function(){

                $(".hideme").css("display", "none");
            });

            $( "button.cancel_order" ).click(function(event) {                
                        var oid = $(this).data('oid'); 
                        $.ajax({
                            type:"GET",
                            url: "<?php echo admin_url('admin-ajax.php'); ?>",
                            data: {
                                action: "delete_order_product",
                                oid: oid
                            },           
                            success: function(data) {
                                if (data.code == 0) {
                                    alert(data.message);
                                } else {
                                 $(".alertmessage").css("display", "flex");                             

                                }
                            }

                        });
                    
                 
               
            });

        });


        

	</script>


