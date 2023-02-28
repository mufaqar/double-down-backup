    <?php /* Template Name: Admin-OrderHandling  */
        get_header('admin');    ?>    	

    <?php include('navigation.php'); ?>
    <div class="admin_parrent">       
        <section id="div1" class="targetDiv activediv tablediv">
                <table id="all" class="table table-striped orders_table" style="width:100%">
                <?php include('partials/daily-orders.php'); ?>
                </table>
                <br/><br/>
            <a target="_blank" data-id="<?php echo $pid;?>" href="<?php echo home_url('pdf-all'); ?>/?order_id=<?php echo $pid;?>" class="download_pdf btn_primary">Last ned PDF (all mat)</a> 
            </section>
    </div>
    
    
    
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
    <section class="hideme  overlay invoice_detail_popup">                                               
            <div class="popup">
                <div class="popup_wrapper">
                    <h3 class="ad_productss">Compnay Orders Details</h3>                 
                        <div class="w-100 ajax_invoice"> </div>  
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross ">
                </div>                
    </section>
    

    
    <?php get_footer('admin') ?>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/weekPicker.min.js"></script>
    <script>
    convertToWeekPicker($("#weekPicker1"));
   
    window.addEventListener('load', function() {
            var element = document.getElementById('displayDate');
            var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
            var observer = new MutationObserver(myFunction);
            observer.observe(element, {
                childList: true
            });
            function myFunction() { 
                document.getElementById("weekform").submit();   
               jqueryFunction();        
                }
            
        });

</script>
  
   

<!-- 

<script type="text/javascript">

   

    jQuery(document).ready(function($) {   

       $('.download_pdf1').click(function() {

        
      
                var order_id = $(this).attr('data-id');
               
              
                $.ajax({
                    type: "POST",
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: "get_download_pdf",
                        order_id: order_id
                    },
                    success: function(data) {                         
                    // alert(data.message);
                    }

                });
            }); 
    

       




    });


  
</script> -->