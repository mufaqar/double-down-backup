<?php
/*
 * Template Name: Forget
 */

get_header('landing');
global $current_user;
$logged_user = wp_get_current_user();
$UIL =  $logged_user->user_login;
$uid =  $logged_user->ID;


if ( is_user_logged_in() ) {
  
    //echo "Redirect If user is login";

//wp_redirect('http://www.nannyportfolio.com/account');
//exit();



} else {

//echo "Not Login" asdasdf'


}



?>



    <!-- login section  -->

    <section class="container login mt-5 mb-5" style="margin-bottom:5rem !important">



        <div class="row align-items-center">
            <div class="col-sm-12 col-md-6 left">
                <div class="login_image_wrapper">
                    <div class="image_card">
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/Procut.png" alt="">
                        <div class="overlay"></div>
                    </div>
                    <div class="image_card">
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/Procut.png" alt="">
                        <div class="overlay"></div>
                    </div>
                    <div class="image_card">
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/Procut.png" alt="">
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="custom_nav_btn">
                    
                    <div class="previous_caro">
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/left arrow.png" alt="Left Arrow">
                    </div>
                    <div class="next_caro">
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/right arrow.png" alt="Right arrow">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 right col-md-6 p-3">
                <h3>Velkommen tilbake til <br>Double Down Dish</h3>
                <p>Husker du ikke ditt</p>
                <form class="resetpassword" id="resetpassword">
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="email" class="form-control border-0 border-bottom rounded-0"
                            id="username" aria-describedby="emailHelp" placeholder="abc@example.com" value="" required>                  
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center " style="margin-top: 3rem !important;">
                    
                        <button type="submit" class="green_btn">Husker du ikke ditt</button>
                    </div>
                    
                </form>
            </div>
        </div>

    </section>


<?php get_footer('landing'); ?>



<script type="text/javascript">   
   jQuery(document).ready(function($) {    
        $("#resetpassword").submit(function(e) {          
            e.preventDefault();
            var username = jQuery('#username').val();              
            jQuery.ajax({
            type:"POST",
            url:"<?php echo admin_url('admin-ajax.php'); ?>",
            data: {
                action: "resetpassword",
                username : username              
            },
            success: function(response){
               
               alert(response.message);
            },
            error: function(results) {
                alert("Error");
            }
            });
        });
	
	});
	</script>



