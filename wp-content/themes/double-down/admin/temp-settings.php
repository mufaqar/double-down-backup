<?php /* Template Name: Admin-Settings  */
get_header();
$uid = get_current_user_id();
$user_info = get_userdata($uid);
//print_r($user_info);
?>
<?php include('navigation.php'); ?>
<!-- tabs -->

<div class="tab_wrapper">
    <?php page_title(); ?>
    <div class='panels'>
        <div class='panel launchClander setting_tab'>            
            <div class="deatil_card d-md-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Shipping & VAT details</h3>
                    <p>Shipping Price : <?php echo get_option('shipping_price');  ?>  </p>
                    <p>VAT Price : <?php echo get_option('vat_price');  ?>  </p>
                </div>
                <div class="pt-4 pt-md-0">
                    <button id="show_shipping" class="btn_primary">Update Shipping</button>
                </div>
            </div> 
        </div>
    </div>
</div>


</div>
</div>
</div>
</div>
</main>






<section class="hideme overlay shipping_popup">
    <div class="popup">
        <form class="update_shipping" id="update_shipping" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Shipping & VAT Details</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Shipment Price</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="shipping_price" id="shipping_price" value="<?php echo get_option('shipping_price');  ?>">
               
                    </div>
                </div>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>VAT Price</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                    <input type="text" name="vat_price" id="vat_price" value="<?php echo get_option('vat_price');  ?>">
                    </div>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Save" />
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>


   


    <section class="hideme alertmessage">
        <div class="popup">
            <div class="popup_wrapper">
                <div class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo">
                    <div class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                        <div class="content mt-5">
                            <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                            <h1 class="finished">Finished!</h1>
                            <h2 class="mb-5 mt-5"><div class="res">Load Ajax Data</div></h2>

                        </div>
                    </div>

                </div>
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section>





<?php get_footer(); ?>

<link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/reources/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

   

    jQuery(document).ready(function($) {        
    
   

        $('#show_shipping').click(function() {
            $(".shipping_popup").css("display", "block");
        });
      

        $('.hidepop').click(function(){  
                
           $(".invoice_detail_popup").css("display", "none");         
       });

        $('._cross').click(function(){ 
          
           $(".hideme").css("display", "none");         
       });

       $("#update_shipping").submit(function(e) {
            e.preventDefault();           
            var shipping_price = jQuery('#shipping_price').val();     
            var vat_price = jQuery('#vat_price').val(); 
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "update_shipping",
                    shipping_price: shipping_price,                 
                    vat_price: vat_price
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {
                        
                               $(".shipping_popup").hide();      
                               $(".res").html(data.message);                                 
                               $(".alertmessage").show();  

                    }
                }

            });

        });

       




    });


  
</script>