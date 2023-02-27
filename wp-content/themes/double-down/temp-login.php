<?php
/*
 * Template Name: Login
 */

get_header('landing');
global $current_user;
$logged_user = wp_get_current_user();
$UIL =  $logged_user->user_login;
$uid =  $logged_user->ID;
$url = home_url('profile');
if ( is_user_logged_in() ) {
   wp_redirect($url);
   exit();

} else {

//echo "Not Login" ;


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
                <p>Please log in below to manage your profile.</p>
                <form class="login_form" id="loginform">
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="email" class="form-control border-0 border-bottom rounded-0"
                            id="username" aria-describedby="emailHelp" placeholder="abc@example.com" value="" required>                  
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control border-0 border-bottom rounded-0"
                            id="password" placeholder="Input your password" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center " style="margin-top: 3rem !important;">
                        <span>Don't remember your <a href="<?php echo home_url('forget-password'); ?>">Password?</a></span>
                        <button type="submit" class="green_btn">Login</button>
                    </div>
                    
                </form>
            </div>
        </div>

    </section>

    <section class="hideme alertmessage">
        <div class="popup">
            <div class="popup_wrapper">
                <div class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                    <img src="<?php bloginfo('template_directory');?>/reources/images/logo.png" class="logo" alt="logo">
                    <div class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                        <div class="content mt-5">
                            <h1 class="finished">Error!</h1>
                            <h2 class="mb-5 mt-5"><div class="res">Load Ajax Data</div></h2>

                        </div>
                    </div>

                </div>
                <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section>
    
    

<?php get_footer('landing'); ?>
<script type="text/javascript">   
   jQuery(document).ready(function($) {   

    
        $('._cross').click(function(){
            $(".hideme").css("display", "none");
        });

        $("#loginform").submit(function(e) {                      
            e.preventDefault();
            var username = jQuery('#username').val();
            var password = jQuery('#password').val();       
            jQuery.ajax({
            type:"POST",
            url:"<?php echo admin_url('admin-ajax.php'); ?>",
            data: {
                action: "userlogin",
                username : username,
                password : password
            },
          
            success: function(data) {
                if (data.code == 0) {                
                     $(".show_profile_popup").hide();
                     $(".res").html(data.message);
                     $(".alertmessage").show();
                } else {
                    window.location.href = "<?php echo home_url('profile'); ?>";
                }
            }
            
            });
        });
	
	});
	</script>


