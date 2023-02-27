<?php /* Template Name: Personal-Catering  */ 
get_header();

?> 
 <?php include('navigation.php'); ?>
 <?php global $current_user; wp_get_current_user();  $uid = $current_user->ID;?>

<div class="custom_container catering_form mt-5 mb-5">
    <div class="_info mt-5 mb-5">
    <h2>We create and deliver catering for most occasions. </h2>
                    <p>

For example, could you think of "Spicy Streetfood" for the football evening with the boys, "High Tea" with the girls or perhaps "Turkish evening" with everyone at work? Feel free to send us information, wishes and needs for the catering of your event! When we receive the form, we will contact you to tailor together a fantastic and tasty menu where only your imagination sets limits!
</p>
    </div>
    <hr>
    <div class="_form mt-5 p-4 pt-5 pb-5">
    <form class="addcatering" id="addcatering" action="#" > 
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Number of people</label>
                    <div class="_select">
                        <input type="text" value="" placeholder="Please enter Number" id="people" required>
                        <input type="hidden" value="<?php echo $uid ?>"  id="uid" >
                    </div>
                </div>

                <div class="col-md-6 mt-3 mt-md-0 mb-3">
                    <label for="">Date of delivery</label>
                    <div class="_select">
                        <input type="date" value="<?php echo date("Y-m-d"); ?>" placeholder="02-05-22" id="date" required>
                    </div>
                </div>


                <div class="col-md-6 mt-3 mt-md-0 mb-3">
                    <label for="">Time of delivery</label>
                    <div class="_select">
                        <input type="time" value="" placeholder="02-05-22" id="time">                 
                    </div>
                </div>

                <div class="col-md-6 mt-3 mt-md-0 mb-3">
                    <label for="">Address of delivery</label>
                    <div class="_select">
                        <input type="text" value="" placeholder="Add your address" id="address" required>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Reason</label>
                    <div class="_select">
                    <input type="text" value="" placeholder="Please enter Reason" id="reason" required>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Food Type</label>
                    <div class="_select">
                        <select id="food_cat">
                        <?php   
                            $food_types = get_terms( array('taxonomy' => 'food_type','hide_empty' => false ) ); 
                            foreach( $food_types as $food_type )  {
                                        $food_type_slug = $food_type->term_id ;
                                        $food_type_name = $food_type->name ; ?>                            
                                        <option value="<?php echo $food_type_slug; ?>" > <?php echo $food_type_name; ?> </option>
                                            <?php
                                }                                                    
                            ?>
                        </select>
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/down-arrow.png" alt="">
                    </div>
                </div>

                <div class="col-md-6 mt-3 mt-md-0 mb-3">
                <label for="">Heating Options</label>
                    <div class="_select">
                        <select id="pro_sub_cat">
                        <?php   
                            $product_sub_tax = get_terms( array('taxonomy' => 'product_sub_category','hide_empty' => false ) ); 
                            foreach( $product_sub_tax as $product_sub_cat )  {
                                        $product_sub_cat_slug = $product_sub_cat->term_id ;
                                        $product_sub_cat_name = $product_sub_cat->name ; ?>                            
                                        <option value="<?php echo $product_sub_cat_slug; ?>" > <?php echo $product_sub_cat_name; ?> </option>
                                            <?php
                                }                                                    
                            ?>
                         </select>
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/down-arrow.png" alt="">
                    </div>
                    
                </div>

                <div class="col-md-6 mb-3">
                            <label for="">Budget Per Person</label>
                                <div class="_select">
                                    <input type="text" value="" placeholder="NOK 349" id="person" required>
                                </div>
                            </div>

                <div class="col-md-6 mb-3">
                                <label for="">Allergens</label>
                                <div class="_select caterting_lable">
                                  
                                    <?php
                                            $allergens_tax = get_terms(array('taxonomy' => 'allergens', 'hide_empty' => false));
                                            foreach ($allergens_tax as $allergens_cat) {
                                                $allergens_cat_slug = $allergens_cat->term_id;
                                                $allergens_cat_name = $allergens_cat->name;?>
                                               

                                                 <label class="caterting_lable_checkbox"><?php echo $allergens_cat_name; ?> 
                                                <input type="checkbox" value="<?php echo $allergens_cat_slug; ?>" name="allergens" >
                                                <span class="checkmark"></span>
                                                </label>
                                                 <?php
                                            }
                                            ?>
                                 

                                </div>
                            </div>

               
                <div class="d-flex justify-content-end savebtn">
                    <input type="submit" class="btn_primary"  value="Save"/>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</main>


<section class="hideme zindex-modal overlay">
        <div class="popup">
            <div class="popup_wrapper">
                <div
                    class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo">

                    <div
                        class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                        <div class="content mt-5">
                            <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                            <h1 class="finished">Finished!</h1>
                            <h2 class="mb-5 mt-5">Your order has beed submitted!</h2>
                        </div>
                    </div>
                    
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/reources//images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section>


    <?php get_footer();?>

     <!-- Font Awsome -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" ></script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript">   
     jQuery(document).ready(function($) {	
        $('._cross').click(function(){
           
           $(".hideme").css("display", "none");
       });
                 
        $("#addcatering").submit(function(e) {                     
            e.preventDefault();                     
            var people = jQuery('#people').val();	             
            var date = jQuery('#date').val();	 
            var time = jQuery('#time').val();	 
            var address = jQuery('#address').val();	             
            var food_type = jQuery('#food_type').val();	         
            var pro_cat = jQuery('#pro_cat').val();	 
            var pro_sub_cat = jQuery('#pro_sub_cat').val();	
            var person = jQuery('#person').val();           
            var allergens = jQuery('#allergens').val(); 
            var reason = jQuery('#reason').val(); 

            
            var uid = jQuery('#uid').val();  
           
            $.ajax(
                {
                    type:"POST",
                    url:"<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: "addcatering",
                        people : people,
                        date : date,                  
                        time : time,
                        address : address,
                        food_type : food_type,                  
                        allergens : allergens,
                        pro_cat : pro_cat,
                        pro_sub_cat : pro_sub_cat,
                        person : person,
                        reason : reason,                        
                        user_type : "Personal",
                        uid : uid
                    },   
                    success: function(data){                      
                     
                        if(data.code==0) {
                                    alert(data.message);
                        }  
                        else {
                           $(".overlay").css("display", "flex");
                      
                        }      
            }
            
             });
         }); 
            
        
     });
	</script>













