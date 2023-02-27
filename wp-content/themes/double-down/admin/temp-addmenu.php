<?php /* Template Name: Admin-AddMenu  */

get_header('admin');


?>
<?php include('navigation.php'); ?>
<h2 class="text-center mt-5 mb-5">Add New Product</h2>
<div class="add_menu container mx-auto">

<form class="addfood" id="addfood" action="#" enctype="multipart/form-data">
        <div class="upload_file">
            <div class="upload_icon"><i class="fa-solid fa-camera"></i></div>
            <input type="file" name="file" id="file"  class="dropify" > 
        </div>
        <div class="mb-4 mt-3">
            <label class="form-label admin_label">Food Name</label>
            <input type="text" class="form-control admin_input" id="food_name" placeholder="Bread Lunch">
            <input type="hidden" id="uid" value="1">
        </div>

        <div class="mb-4 mt-3">
            <label class="form-label admin_label">Available Date</label>
            <input type="date" class="form-control admin_input" id="food_date" placeholder="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>">
            <input type="hidden" id="uid" value="1">
        </div>


        <div class="mb-4 mt-3">
            <label class="form-label admin_label">Product Category</label>
            <div class="_ad_sel_wrapper">
                <div class="admin_arrow_down "><i class="fa-solid fa-angle-down"></i></div>
                <div>
                    <select id="lunch_type" class="form-select admin_inputselect">                                          
                        <?php
                                    $menu_types = get_terms(array('taxonomy' => 'menu_types', 'hide_empty' => false));
                                    foreach ($menu_types as $menu_type) {
                                        $type_slug = $menu_type->term_id;
                                        $type_name = $menu_type->name; ?>
                                        <option value="<?php echo $type_slug ?>"><?php echo $type_name ?></option>
                                    <?php
                                    }
                                    ?>
                    </select>
                </div>

            </div>
        </div>
        <div class="mb-4 mt-3">
            <label class="form-label admin_label">Allergens</label>
            <div class="_ad_sel_wrapper">

                <div class="admin_arrow_down plus"><i class="fa-solid fa-plus"></i></div>
                <div>
                    <select id="lunch_sub_type" class="form-select admin_inputselect" >
                       
                        <?php
                                    $menu_sub_types = get_terms(array('taxonomy' => 'allergies', 'hide_empty' => false));
                                    foreach ($menu_sub_types as $menu_sub_type) {
                                        $type_sub_slug = $menu_sub_type->term_id;
                                        $type_sub_name = $menu_sub_type->name; ?>
                                        <option value="<?php echo $type_sub_slug ?>"><?php echo $type_sub_name ?></option>
                                    <?php
                                    }
                                    ?>
                    </select>
                </div>
                <div class="d-none _options">
                    <div>
                        <span>Sesame Seeds</span>
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div>
                        <span>Celery</span>
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div>
                        <span>Gluten</span>
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div>
                        <span>Gluten</span>
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 mt-3">
            <label class="form-label admin_label">NOK</label>
            <input type="text" class="form-control admin_input"  placeholder="100 KR" value="" id="food_price">
        </div>

        <div class="adminbtn_div">
            <button class="admin_save_btn" type="submit">Save</button>
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
                            <h2 class="mb-5 mt-5">Food Product Added Sucessfully</h2>
                        </div>
                    </div>
                    
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section>
<?php get_footer('admin') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript">   
     jQuery(document).ready(function($) {	
        $('._cross').click(function(){
           
           $(".hideme").css("display", "none");
       });
                 
        $("#addfood").submit(function(e) {                     
            e.preventDefault();                       
            var food_name = jQuery('#food_name').val();	             
            var lunch_type = jQuery('#lunch_type').val();	 
            var lunch_sub_type = jQuery('#lunch_sub_type').val();	 
            var food_price = jQuery('#food_price').val();	             
            var uid = jQuery('#uid').val();	
            var food_date = jQuery('#food_date').val();	            
            file_data = jQuery('#file').prop('files')[0];
            form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('action', 'addfood');
            form_data.append('food_name', food_name);
            form_data.append('lunch_type', lunch_type);	
            form_data.append('lunch_sub_type', lunch_sub_type); 
            form_data.append('food_price', food_price); 
            form_data.append('uid', uid);  
            form_data.append('food_date', food_date);             
           
                
            $.ajax(
                {   
                    url:"<?php echo admin_url('admin-ajax.php'); ?>",
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    data: form_data,
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













