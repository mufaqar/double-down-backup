<?php /* Template Name: Signup-Agreement  */ 

get_header();

reddirectProfile();

$week =  date('w') ;
$monday  = date( 'Y-m-d', strtotime( 'monday next week' ) );
$current_time =  strtotime(current_datetime()->format('H:i'));
$order_time = strtotime('11:00');
if ($current_time >= $order_time) {
    $tomorrow  = date('Y-m-d', strtotime(' +2 day'));  
    }
else { 
     $tomorrow  = date('Y-m-d', strtotime(' +1 day'));      
    }
if ($week == '5') {
    $order_date =  $monday;}
else {
    $order_date = $tomorrow; 
}
?>

<main class="business_agreement">
        <div class="agreement_wrapper d-flex position-relative justify-content-center flex-column align-items-center p-4">
        <a href="<?php echo home_url(); ?>"> <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo"></a>
            <div class="agreement_steps d-flex justify-content-center align-items-center mt-4 mt-lg-5 mb-lg-5">
                <div class="step step_one"></div>
                <div class="step step_two"></div>
                <div class="step step_three"></div>
            </div>
        <form class="addprofile" id="profileform" action="#" > 
            <div class="first_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
            <a href="<?php echo home_url(); ?>"> <img src="<?php bloginfo('template_directory'); ?>/reources/images/left arrow.png" class="arrow position-absolute" alt="back arrow"> </a>
                <p>NB! Is the company you work for already registered? Feel free toask an admin for the corporate
                    agreement for an invitation to join</p>
                <div class="pl-4 pr-4">
                    <h2 class="">Create Buisness Agreement</h2>
                    <div class="form-group w-100 ">
                        <label for="compnay_name">Company Name</label>
                        <input type="text" class="form-control" id="compnay_name" placeholder="Company Name" required >
                    </div>
                    <div class="form-group w-100 mt-2">
                        <label for="compnay_name">Company Number</label>
                        <input type="text" class="form-control" id="compnay_number" placeholder="Company Number" required >
                    </div>

                    <div class="form-group w-100 mt-3 mb-5">
                        <label for="compnay_delivery_address">Delivery adress</label>
                        <textarea class="form-control" id="compnay_delivery_address" rows="3"
                            placeholder="Enter Delivery adress"></textarea>
                        <!-- <input type="text" class="form-control" id="compnay_agreement" 
                            placeholder="Agreement Title" > -->
                    </div>

                    <a type="next" class="btn_primary d-block next" onclick="stepOne()">Continue</a>
                </div>
            </div>

            <!-- step 2  -->
            <div class="secound_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/left arrow.png" class="arrow position-absolute" alt="back arrow"
                    onclick="backToStepOne()">

                <div class="pl-4 inner-content pr-4">
                    <h2 class=""> Customize company agreement for Oranchy AS</h2>
                    <p class="align-self-start">Choose if the company should cover some of the employees lunch.</p>
                    <div class="launch mt-3 mb-4 form-group w-100 d-lg-flex align-items-center">
                        <input type="text" class="form-control" id="lunch_benefit" 
                            placeholder="Company Pay 20">
                        <select name="lunch_benfit_type" id="lunch_benfit_type" class="">
                            <option value="%">%</option>
                            <option value="$">NOK</option>
                        </select>
                        <p class="text-nowrap">of the lunch to each employee?</p>
                    </div>
                    <h6>First Possible start Date</h6>
                    <p class="text">Employees will not automatically start up on this data, but no one can startup,
                        earlier than the specific date</p>
                    <div class="form-group w-100 mt-3 mb-5">
                        <input type="text" class="form-control" id="starting_date" value="<?php echo $order_date;?>"
                            placeholder="<?php  echo $order_date; ?>" disabled>
                        <p class="invite">Invite more people from work to the company agreement</p>
                        <h6>It’s easy to add more employees later too</h6>
                    </div>

                    <div class="emplate form-group w-100 mb-3 d-flex align-items-center">
                        <label for="exampleInputEmail1">1</label>
                        <input type="text" class="form-control " id="invite_user1"
                            aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="emplate form-group w-100 mb-3 d-flex align-items-center">
                        <label for="exampleInputEmail1">2</label>
                        <input type="text" class="form-control " id="invite_user2"
                            aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="emplate form-group w-100 mb-5 d-flex align-items-center">
                        <label for="exampleInputEmail1">3</label>
                        <input type="text" class="form-control " id="invite_user3"
                            aria-describedby="emailHelp" placeholder="">
                    </div>

                    <a type="next" class="btn_primary d-block next" onclick="stepTwo()">Continue</a>
                </div>
            </div>

            <!-- step 3  -->
            <div
                class="third_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/left arrow.png" class="arrow position-absolute" alt="back arrow"
                    onclick="backToStepTwo()">

                <div class="pl-4 third pr-4">

                    <p> As a buisness administrator, you must hve your own user to log in. Then you get full access
                        tothe corporate agreement , and can add more administrators</p>
                    <h2 class="">Your Information</h2>
                    <div class="form-group w-100">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your Name" value="" required >
                    </div>
                    <div class="form-group w-100 mt-3">
                        <label for="username">Email</label>
                        <input type="text" class="form-control" id="username" placeholder="Your Email Address" value="" required>
                    </div>
                    <div class="form-group w-100 mt-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Your Phone Number" value="">
                    </div>

                    <div class="pinfo mt-5">
                        <h2 class="">Terms of use, privacy and relevant information</h2>
                        <p class="text"> 
                            I would like to receive relevant information about products and services
                            from Double Down Dish. This could be information, for example
                            about lunch menus and nutritional content, news and changes,
                            offers, promotions, surveys, etc. We promise not to bother you prematurely.
                        </p>
                    </div>

                    <div class="d-flex align-items-center mb-5">
                        <p class="">
                            <input type="radio" id="test1" name="radio-group" checked>
                            <label for="test1">Yes, Please</label>
                        </p>
                        <p style="margin-left: 2rem;">
                            <input type="radio" id="test2" name="radio-group">
                            <label for="test2">No Thanks</label>
                        </p>
                    </div>

                    <button type="next" class="btn_primary d-block next">Complete</button>
                </div>
            </div>

      
        </form>
        <div id="last_step">
            <div  class="finish_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">            
                <div class="content mt-5">
                    <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                    <h1 class="finished">Finished!</h1>
                    <h2 class="looking">We look forward to make you lunch</h2>
                    <p class="find_information">We have now sent you an email where youwill find information on how to login and manage your company and your orders. Companies receive an invoice every second week.
                    </p>
                    <h3 class="employees_receive">Employees will be withdraw from their cards every end of the lunch week.</h3>
                    <a href="<?php echo home_url(); ?>" class="btn_primary mb-5">Go to the front</a>
                </div>                    
            </div>

        </div>


    
</div>

</main>






    <?php get_footer();?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">   
     jQuery(document).ready(function($) {				
        $("#profileform").submit(function(e) {               
            e.preventDefault();
            var username = jQuery('#username').val();
            var name = jQuery('#name').val();          
            var phone = jQuery('#phone').val();	             
            var compnay_name = jQuery('#compnay_name').val();	 
            var compnay_delivery_address = jQuery('#compnay_delivery_address').val();	 
            var compnay_number = jQuery('#compnay_number').val();	            
            var start_date = jQuery('#start_date').val();      
            var lunch_benefit = jQuery('#lunch_benefit').val();	 
            var lunch_benfit_type = jQuery('#lunch_benfit_type').val();	 
            var invite_user1 = jQuery('#invite_user1').val();	 
            var invite_user2 = jQuery('#invite_user2').val();	
            var invite_user3 = jQuery('#invite_user3').val();	 

            $.ajax(
                {
                    type:"POST",
                    url:"<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: "company_signup_with_employees",
                        username : username,
                        name : name,
                        phone : phone,
                        compnay_name : compnay_name,   
                        compnay_number : compnay_number,                  
                        compnay_delivery_address : compnay_delivery_address,
                        lunch_benfit_type : lunch_benfit_type,
                        lunch_benefit : lunch_benefit,
                        invite_user1 : invite_user1,
                        invite_user2 : invite_user2,
                        invite_user3 : invite_user3,
                        start_date : start_date                     

                    },   
                    success: function(data){ 
                     
                        if(data.code==0) {
                                    alert(data.message);
                        }  
                        else {
                            $(".addprofile").css("display", "none");
                            $("#last_step").css("display", "block");
                        }      
            }
            
             });
         }); 
            
        
     });
	</script>







