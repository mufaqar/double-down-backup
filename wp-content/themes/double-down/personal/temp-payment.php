<?php /* Template Name: Payment (P)  */
get_header();
global $current_user;
wp_get_current_user();
$uid =  get_current_user_id() ;

?>
<?php include('navigation.php'); ?>
<div class="custom_container order_wrapper mt-5 mb-5">
    <form class="addmeeting" id="addmeeting" action="#">
        <div class="_inner mt-4 p-5">
            
            

            <div class="_content mt-5 mb-5">
                <h2>Payment </h2>
                <div class="row">

                <?php

                    /*{
                        "checkout": {
                        "integrationType": "HostedPaymentPage",
                        "returnUrl": "https://<YOUR_SERVER>/cart.html",
                        "termsUrl": "https://<YOUR_SERVER>/terms.htmtl"
                        },
                        "order": {
                        "items": [
                            {
                            "reference": "ref42",
                            "name": "Demo product",
                            "quantity": 2,
                            "unit": "hours",
                            "unitPrice": 80000,
                            "grossTotalAmount": 160000,
                            "netTotalAmount": 160000
                            }
                        ],
                        "amount": 160000,
                        "currency": "SEK",
                        "reference": "Demo Order"
                        }
  }

  */


                        //$payload = file_get_contents(get_template_directory_uri().'/personal/payload.json');

                        //echo $payload ."<hr/>";



                        $order_data = array();
                        $order_data = array( 
                            'checkout'  => array(  
                                                "integrationType"=> "HostedPaymentPage",
                                                "returnUrl"=> "http://localhost/clients/food/test",
                                                'termsUrl' => "http://localhost/clients/food/terms", 
                                            ), 
                        
                        'order' => array(  
                                            'amount'         => 20000,
                                            'currency'       => "USD",
                                            'reference'      => "Daily Food Order",
                                            'items'          => array(array(       
                                                "reference"=> "ref42",
                                                "name"=> "Daily Food Order Product 03",
                                                "quantity"=> 2,
                                                "unit"=> "hours",
                                                "unitPrice"=> 10000,
                                                "grossTotalAmount"=> 20000,
                                                "netTotalAmount"=> 20000,
                                            ),)
                       
                        ));       
                        
                        echo json_encode($order_data);


                function redirect_to_checkout($json) {

                  
                        $a = json_decode($json, true);

                     
                        if (json_last_error() != JSON_ERROR_NONE) {
                                echo(json_last_error_msg());
                                var_dump($json);
                                exit("Unable to parse json response");
                        }
                        $redirectURL = $a['hostedPaymentPageUrl'];
                        if (empty($redirectURL)) {
                                var_dump($json);
                                exit("Could not find the key 'hostedPaymentPageUrl'");
                        }
                     
                        $redirectURL = $redirectURL ;
                        header("Location: " . $redirectURL);
                        exit();
                        
                }

                //$payload = file_get_contents(get_template_directory_uri().'/personal/payload.json');

              
                //assert(json_decode($payload) && json_last_error() == JSON_ERROR_NONE);

                $ch = curl_init('https://test.api.dibspayment.eu/v1/payments');
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($order_data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
                        'Content-Type: application/json',
                        'Accept: application/json',
                        'Authorization: test-secret-key-90d47cae99df4ffa8ccf386d9d104441'));                                                
                $result = curl_exec($ch);
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);              

                redirect_to_checkout($result);

?>

                   

                </div>
            </div>

            <div class="row">
                
                <div class="col-md-6 d-flex justify-content-end align-items-end">
                    <button class="btn green_btn">Order Now</button>
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
                        <a href="<?php echo home_url('/profile/orders'); ?>" class="btn_primary mb-5">View Orders</a>
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
                    order: "Personal"

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