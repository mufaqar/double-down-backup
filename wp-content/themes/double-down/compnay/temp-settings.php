<?php /* Template Name: Compnay-Settings  */ 
get_header('company');
$uid = get_current_user_id();
?>
<?php include('navigation.php'); 
                        $available_in_active_employee = get_users(
                            array(
                                'role' => 'personal',
                                'meta_query' => array(
                                    array(
                                        'key' => 'employee',
                                        'value' => $uid,
                                        'compare' => '=='
                                    ),
                                     array(
                                        'key' => 'status',
                                        'value' => 'inactive',
                                        'compare' => '=='
                                    )
                                )
                            )
                        );

                        $available_active_employee = get_users(
                            array(
                                'role' => 'personal',
                                'meta_query' => array(
                                    array(
                                        'key' => 'employee',
                                        'value' => $uid,
                                        'compare' => '=='
                                    ),
                                    array(
                                        'key' => 'status',
                                        'value' => 'active',
                                        'compare' => '=='
                                    )
                                )
                            )
                        );                 



                        //print "<pre>";
                        //print_r($available_drivers);
                        ?>

<div class="tab_wrapper">
    <?php page_title()?>
        
        <div class='panels'>
            <div class='panel launchClander setting_tab'>
                <h2>Innstillinger for bedriftsavtale</h2>
                <p>Som bedriftsadministrator kan du få oversikt over og gjøre endringer til din firmaavtale her. </p>
                <div class="deatil_card d-md-flex justify-content-between align-items-center">
                    <div class="info">
                        <h3>Detaljer om avtalen</h3>
                        <p>Selskapet betaler <span><strong><?php echo get_user_meta($uid, 'lunch_benefit', true );  ?></strong><?php $type =  get_user_meta($uid, 'lunch_benfit_type', true ); echo $type;  ?> <?php if($type == '$') { echo "Nok";} ?> </span> av hver lusj</p>
                        <ul class="mt-2">
                        <li><span>Selskapsnavn:</span> <?php echo get_user_meta($uid, 'compnay_name', true );  ?> </li>
                        <li><span>Firmanummer:</span> <?php echo get_user_meta($uid, 'compnay_number', true );  ?> </li>
                        </ul>
                    </div>

                    <div class="pt-4 pt-md-0">
                        <button id="agreement" class="btn_primary">Oppdater avtale</button>
                    </div>
                </div>
                <!-- 2nd -->
                <div class="deatil_card d-md-flex justify-content-between align-items-center">
                    <div class="info">                    
                        <h3>Ansatte i avtalen</h3>
                        <p><?php echo  count($available_active_employee); ?> Ansatt : </p>
                    </div>
                    <div class="pt-4 pt-md-0">
                        <button id="emp_agreement" class="btn_primary">Oppdater ansatte</button>                        
                    </div>

                </div>


                <!-- 2 A -->
                <div class="deatil_card d-md-flex justify-content-between align-items-center">
                    <div class="info">                    
                        <h3>Forsendelsesmetoder</h3>
                        <p><?php $method =  get_user_meta($uid, 'compnay_shipping_method', true );

                        if($method == 'method_one')
                        { echo "Method 1"; echo " [Company Pay ". get_option('shipping_price') . "]";  }
                        elseif($method == 'method_two')
                        { echo "Method 2"; echo " [Divided on all Employees]";  }
                        else {
                            { echo "Method 3"; echo " [Pickup]";  }

                        }
                        
                        
                        ?></p>
                    </div>
                    <div class="pt-4 pt-md-0">
                        <button id="shipping_method" class="btn_primary">Oppdateringsmetode</button>                        
                    </div>

                </div>
                <!-- 3rd  -->
                <div class="deatil_card d-md-flex justify-content-between align-items-center">
                    <div class="info">
                        <h3>Møtemat</h3>
                        <p>Alle fortjener god mat - også de du
                            har invitert til møte!</p>
                    </div>
                    <div class="pt-4 pt-md-0">
                        <a href="<?php echo home_url('meeting'); ?>" class="btn_primary">Bestill møtemat</a>
                    </div>
                </div>

                <!-- 4th  -->
                <div class="deatil_card d-md-flex justify-content-between align-items-center">
                    <div class="info">
                        <h3>Leveringsadresse</h3>
                        <p> <?php echo get_user_meta($uid, 'compnay_delivery_address', true );  ?> <br> </p>
                     </div>
                    <div class="pt-4 pt-md-0">
                        <button id="delivery_address" class="btn_primary">Oppdatere adresse</button>
                    </div>
                </div>

                <!-- 5th  -->
                <div class="deatil_card d-md-flex justify-content-between align-items-center">
                    <div class="info">
                        <h3>Daglig oversikt</h3>
                        <p>Daglig oversikt av bestillinger</p>
                    </div>
                    <div class="pt-4 pt-md-0">
                    <button id="daily_orders" class="btn_primary">Se oversikt</button>
                    </div>
                </div>

                <!-- 6th  -->
                <div class="deatil_card d-md-flex justify-content-between align-items-center">
                    <div class="info">
                        <h3>Betaling og ordreinfo</h3>
                      
                    </div>
                    <div class="pt-4 pt-md-0">
                    <button id="show_invoice_detail" data-id="<?php echo $uid ?>" class="btn_primary">Betalingsdetaljer</button>
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





    <section class="hideme overlay delivery_address">
        <div class="popup">
            <form class="update_deliver_address" id="update_deliver_address" action="#" > 
                <div class="popup_wrapper">
                    <h3 class="ad_productss">Selskap Leveringsadresse</h3>               
                    <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                        <label>Leveringsadresse</label>
                        <div class="_field d-flex justify-content-between align-items-center">
                            <input type="text" name="address" id="address" placeholder="<?php echo get_user_meta($uid, 'compnay_delivery_address', true );  ?>" >
                            <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid" >    
                            <!-- <img src="<?php bloginfo('template_directory'); ?>/reources/images/pin.png" alt=""> -->
                        </div>
                    </div>
                    <!-- <div class="add_address d-flex align-items-center justify-content-end mt-3">
                        <p><span>Add more address!</span></p>
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/plus-thin.png" alt="">
                    </div> -->
                    <div class="mt-5">
                        <input type="submit" class="btn_primary"  value="Lagre"/>
                    </div>
                    
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
                </div>
            </form>
        </div>
    </section> 

    
    <section class="hideme overlay emp_agreement">
        <div class="popup">
            <div class="popup_wrapper">
                <h3>Ansatte i avtalen</h3>
                <h6>Totalt antall ansatte: <?php echo  count($available_active_employee); ?> </h6>
                <hr>
                <div class="hideme alert alert-success showalert" role="alert">
                        <div class="response"></div>
                    </div>
                <div>
                    <div class="btn_toggle">
                        <div class="btn_wrapper d-flex justify-content-center">
                            <button href="" class="activeEmp " onclick="activeEmp()">Aktive ansatte | <?php echo  count($available_active_employee); ?></button>
                            <button href="" class="inactiveEmp active" onclick="inactiveEmp()">Inaktive ansatte | <?php echo  count($available_in_active_employee); ?></button>
                        </div>
                    </div>

                    <!-- active content  -->
                    <div class="activeEmp_content emp_content ">
                        <div>                            
                            <section>
                            <form class="deactivate_employes" id="deactivate_employes" action="#">
                            <div class="p-4 _action" id="_action">                   
                                <div class="d-flex justify-content-between mt-3">
                                    <button id="todoactive" class="btn_primary">Deaktiver</button>
                                </div>
                            </div>

                                <?php foreach($available_active_employee as $emp)
                                {

                                //  print "<pre>";
                                    //print_r($emp);
                                    
                                    ?>
                                    <div class="__inner d-flex align-items-center justify-content-between mt-2">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" id="emp_<?php echo $emp->ID ?>" name="emp_active" value="<?php echo $emp->ID ?>">
                                            <label for="emp_<?php echo $emp->ID ?>" class="label"></label>
                                            <p><?php echo $emp->user_login ?></p>
                                        </div>
                                        <!-- <p>No fixed delivery</p> -->
                                    </div>

                                    <?php    }     ?>



                                    

                                    
                                    </form>
                                
                            </section>
                        </div>
                            

                      
                    </div>

                    <!-- inactive content  -->
                    <div class="inactiveEmp_content emp_content active">  
                        <div>
                            <section>
                            <form class="activate_employes" id="activate_employes" action="#">
                            <div class="p-4 _action" id="_action_inactive">                     
                                <div class="d-flex justify-content-between mt-3">
                                    <button id="todoactive" class="btn_primary">Activate</button>
                                </div>
                            </div>
                           

                                <?php foreach($available_in_active_employee as $emp)
                                {

                                  //  print "<pre>";
                                    //print_r($emp);
                                    
                                    ?>
                                    <div class="__inner d-flex align-items-center justify-content-between mt-2">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" id="emp_<?php echo $emp->ID ?>" name="emp_deactive" value="<?php echo $emp->ID ?>">
                                            <label for="emp_<?php echo $emp->ID ?>" class="label"></label>
                                            <p><?php echo $emp->user_login ?></p>
                                        </div>
                                        <!-- <p>No fixed delivery</p> -->
                                    </div>

                                    <?php


                                }
                                ?>



                                    

                                    
                                    </form>
                                    <form class="add_employes" id="add_employes" action="#">
                                    <hr class="mt-4 mb-4">
                                    <h3>+ Inviter nye ansatte</h3>
                                    <div class="__inner add  d-flex align-items-center justify-content-between mt-3">
                                       
                                            <div class="d-flex align-items-center w-100">
                                                <input type="email" id="email" name="email" value="" class="w-100">
                                                <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>" class="w-100">
                                                <button class="d-flex align-items-center">
                                                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/plus-thin.png" alt="">
                                                    <span>Legg til</span>
                                                </button>
                                            </div>  
                                                                            
                                    </div>
                                    </form> 
                                
                            </section>
                        </div>
                    </div>
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section>


    <section class="hideme overlay shipping_method_popup">
        <div class="popup">
        <form class="update_shipping_method" id="update_shipping_method" action="#" > 
            <div class="popup_wrapper">
                <h3>Forsendelsesmetoder</h3>
                <div>
                       <div class="btn_wrapper d-inline-flex justify-content-center">
                              <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid" >    
                              <input type="radio" id="method_one" name="shipping_methods" value="method_one">
                              <label for="method_one">Metode 1 (Bedriftslønn Kr <?php echo get_option('shipping_price');  ?>)</label><br>
                              <input type="radio" id="method_two" name="shipping_methods" value="method_two">
                              <label for="method_two">Metode 2 (delt på ansatte)</label><br>
                              <input type="radio" id="method_three" name="shipping_methods" value="method_three">
                              <label for="method_three">Metode 3 (henting)</label>
                        </div>  
                        <div class="mt-5">                    
                        <input type="submit" class="btn_primary"  value="Lagre"/>
                    </div>
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
            </form>
        </div>
    </section>

    <section class="hideme overlay agreement">
        <div class="popup">
        <form class="update_agreement" id="update_agreement" action="#" > 
                <div class="popup_wrapper">
                    <h3 class="ad_productss">Detaljer om avtalen</h3>               
                    <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                        <label>Selskapsnavn</label>
                        <div class="_field d-flex justify-content-between align-items-center">
                            <input type="text" name="compnay_name" id="compnay_name" value="<?php echo get_user_meta($uid, 'compnay_name', true );  ?>" >
                            <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid" >                               
                        </div>
                    </div>
                    <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                        <label>Firmanummer</label>
                        <div class="_field d-flex justify-content-between align-items-center">
                            <input type="text" name="compnay_number" id="compnay_number" value="<?php echo get_user_meta($uid, 'compnay_number', true );  ?>" >
                                                     
                        </div>
                    </div>
                    <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label class="mt-4 ">Bedriftslønn</label>
                    <div class="_field _pay mb-4 form-group w-100 d-flex align-items-center">
                        <input type="text" class="form-control" id="lunch_benefit"  value="<?php echo get_user_meta($uid, 'lunch_benefit', true );  ?>">
                        <select name="business_setting_type" id="business_setting_type" >
                            <option value="%">%</option>
                            <option value="$">$</option>
                        </select>
                    </div>
                    </div>                    
                    <div class="mt-5">                    
                        <input type="submit" class="btn_primary"  value="Lagre"/>
                    </div>
                    
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
                </div>
            </form>
        </div>
    </section>


    <section class="hideme overlay invoice">
        <div class="popup">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Faktura</h3>

                <div class="invoice_table">
                <table class="_table">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Uke</th>                                                               
                                            <th scope="col">Type</th>                                    
                                            <th scope="col">Price</th>                                     
                                            <th scope="col">Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    
                                            <?php 
                                                global $current_user;
                                                wp_get_current_user();
                                                query_posts(array(
                                                        'post_type' => 'orders',
                                                        'posts_per_page' => -1,
                                                        'order' => 'desc',
                                                    
                                                        'meta_query' => array(                                                      
                                                            
                                                            'relation' => 'AND',
                                                            
                                                                array(
                                                                    'key'     => 'user_type',
                                                                    'value' => 'Company',
                                                                    'compare' => '=',
                                                                

                                                                ),
                                                                array(
                                                                    'key'     => 'order_uid',
                                                                    'value' => $current_user->ID,
                                                                    'compare' => '='
                                                                )
                                                        )
                                                        
                                                    ));              
                                            
                                                    if (have_posts()) :  while (have_posts()) : the_post(); ?>
                                                                    <tr>
                                                                            <td scope="row"><?php the_title()?></td>
                                                                            <td><?php echo get_post_meta( get_the_ID(), 'order_week', true ); ?></td>
                                                                            <td><?php echo get_post_meta( get_the_ID(), 'order_type', true ); ?>
                                                                            <?php  if((get_post_meta(get_the_ID(), "order_day", true))) { ?>
                                                                                ( <?php echo get_post_meta( get_the_ID(), 'order_day', true ); ?> )
                                                                                <?php } ?>
                                                                        </td>                                                                    
                                                                            <td><?php echo get_post_meta( get_the_ID(), 'order_total', true ); ?></td>                                                            
                                                                            <td><button  data-id="<?php echo get_the_ID() ?>" class="show_invoice_detail_123 btn_primary">Detail</button></td>
                                                                        
                                                                            </tr>
                                                <?php endwhile; wp_reset_query(); else : ?>
                                                    <tr>  <td colspan="6"><?php _e('No Invoice  Found','ddd_translate'); ?></td></tr>
                                                    <?php endif; ?>  
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>   
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
                </div>
            </div>
        </div>
    </section>

    <section class="hideme  overlay invoice_detail_popup">                                               
            <div class="popup">
                <div class="popup_wrapper">
                    <h3 class="ad_productss">Fakturadetaljer</h3>                 
                        <div class="w-100 ajax_invoice"> </div>  
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross ">
                </div>                
    </section>


    <section class="hideme  overlay daily_orders_popup">                                               
            <div class="popup">
                <div class="popup_wrapper">
                    <h3 class="ad_productss">Daglig overview of orders</h3> 
                <div class="custom_container catering_wrapper mt-5 mb-5">
                                <div class="calender_wrapper justify-content-between align-items-center">                        
                                        <div class="catering_card_wrapper">
                                            <div class="invoice_table">
                                                <table class="_table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Bestillings ID</th>
                                                        <th scope="col">Dato</th>
                                                        <th scope="col">Ordre type</th>
                                                        <th scope="col">Uke</th>
                                                        <th scope="col">Total pris</th>
                                                        <th scope="col">Brukertype</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>                                    
                                                        <?php 
                                                            global $current_user;
                                                            wp_get_current_user();
                                                            query_posts(array(
                                                                    'post_type' => 'orders',
                                                                    'posts_per_page' => -1,
                                                                    'order' => 'desc',                                               
                                                                    'meta_query' => array(  
                                                                        'relation' => 'AND',
                                                                            array(
                                                                                'key'   => 'order_type',
                                                                                'value' => 'Meeting',
                                                                                'compare' => '!='
                                                                            ),
                                                                            array(
                                                                                'key'     => 'user_type',
                                                                                'value' => 'Personal',
                                                                                'compare' => '=',
                                                                            ),
                                                                        
                                                                    )
                                                                    
                                                                ));              
                                                        
                                                                if (have_posts()) :  while (have_posts()) : the_post(); ?>
                                                                            
                                                                                <tr>
                                                                                        <td scope="row"><?php the_title()?></td>
                                                                                        <td><?php  the_time('M j, Y') ?></td>
                                                                                        <td><?php echo get_post_meta( get_the_ID(), 'order_type', true ); ?></td>
                                                                                        <td><?php echo get_post_meta( get_the_ID(), 'order_week', true ); ?></td>
                                                                                        <td>NOK <?php echo get_post_meta( get_the_ID(), 'order_total', true ); ?></td>
                                                                                        <td><?php echo get_post_meta( get_the_ID(), 'user_type', true ); ?></td>
                                                                                        <td><?php echo get_post_meta( get_the_ID(), 'order_status', true ); ?> <i class="fa-solid fa-down-to-line"></i></td>
                                                                                        </tr>
                                                            <?php endwhile; wp_reset_query(); else : ?>
                                                                
                                                                <?php endif; ?>  
                                                        
                                                        
                                                    </tbody>
                                                </table>
                                            </div>                

                                        </div>
                            
                                    </div>
                                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross ">
                                    


                        
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

<?php get_footer();?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/reources/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript">   
     jQuery(document).ready(function($) 
        {   
            
            $('#delivery_address').click(function(){            
                $(".delivery_address").css("display", "block");
            });
            $('#agreement').click(function(){
                $(".agreement").css("display", "block");
            });

            $('#emp_agreement').click(function(){
                $(".emp_agreement").css("display", "block");
            });

            $('#shipping_method').click(function(){
                $(".shipping_method_popup").css("display", "block");
            });


            
            
            $('#invoice').click(function(){
                $(".invoice").css("display", "block");
            });
            $('#daily_orders').click(function(){
                $(".daily_orders_popup").css("display", "block");
            });           

            $('._cross').click(function(){
           
                $(".hideme").css("display", "none");
              
            });            
            $("#add_employes").submit(function(e) { 
                e.preventDefault(); 
                var email = jQuery('#email').val();
                var uid = jQuery('#uid').val();
              
                $.ajax(
                    {
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: "add_employes",
                            email : email,                           
                            uid : uid
                        },   
                        success: function(data){                      
                        
                           

                               $(".emp_agreement").hide();      
                               $(".res").html(data.message);                                 
                               $(".alertmessage").show();  
                             
                                
                    }
                
                });


            });

           
            $("#deactivate_employes").submit(function(e) { 
                e.preventDefault(); 
                var uid = jQuery('#uid').val();
                var active_emp = [];
                $.each($("input[name='emp_active']:checked"), function(){
                    active_emp.push($(this).val());
                });
                //var email = jQuery('#email').val();
               // var uid = jQuery('#uid').val();
                $.ajax(
                    {
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: "de_activate_employees",
                            active_emp : active_emp,                           
                            uid : uid
                        },   
                        success: function(data){                      
                        
                            if(data.code==0) {

                                
                                $(".emp_agreement").hide();      
                                $(".res").html(data.message);                                  
                               $(".alertmessage").show();                             
                                 
                            }  
                                
                    }
                
                });
            });
           
           
            $("#activate_employes").submit(function(e) { 
                e.preventDefault(); 
                var uid = jQuery('#uid').val();
                var active_emp = [];
                $.each($("input[name='emp_deactive']:checked"), function(){
                    active_emp.push($(this).val());
                });
                $.ajax(
                    {
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: "activate_employees",
                            active_emp : active_emp,                           
                            uid : uid
                        },   
                        success: function(data){  
                            if(data.code==0) {
                                $(".emp_agreement").hide();      
                                $(".res").html(data.message);                                  
                               $(".alertmessage").show();   
                            }  
                               
                    }
                
                });
            });
                        
            $("#update_deliver_address").submit(function(e) { 
                e.preventDefault(); 
                var address = jQuery('#address').val();
                var uid = jQuery('#uid').val();
               
                $.ajax(
                    {
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: "company_deliver_address",
                            address : address,                           
                            uid : uid
                        },   
                        success: function(data){  
                            if(data.code==0) {  
                           
                                  
                              
                          }  
                          else {
                            $(".delivery_address").hide();                           
                             $(".res").html(data.message);                                  
                             $(".alertmessage").show(); 


                          }     
                    }
                
                });
                
            }); 
            $("#update_agreement").submit(function(e) { 
                e.preventDefault(); 
                var compnay_name = jQuery('#compnay_name').val();
                var compnay_number = jQuery('#compnay_number').val();
                var lunch_benefit = jQuery('#lunch_benefit').val();  
                var benefit_type = jQuery('#business_setting_type').val();
                var uid = jQuery('#uid').val();
                $.ajax(
                    {
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: "update_agreement",
                            compnay_name : compnay_name, 
                            compnay_number : compnay_number,
                            lunch_benefit : lunch_benefit,  
                            benefit_type : benefit_type,                           
                            uid : uid
                        },   
                        success: function(data){                      
                        
                            if(data.code==0) {
                                      
                            }  
                            else {
                               
                               $(".agreement").hide();                           
                             $(".res").html(data.message);                                  
                             $(".alertmessage").show();  
                        
                            }      
                    }
                
                });
                
            }); 

            $('#show_invoice_detail').click(function() {
                $(".invoice_detail_popup").css("display", "block");
                var orderid = $(this).attr('data-id')
                var uid = jQuery('#uid').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: "get_invoice_detail_personal_company",
                        orderid: orderid,
                        uid: uid
                    },
                    success: function(data) {

                        if (data.code == 0) {

                        // alert(data.message);
                        } else {
                            $(".ajax_invoice").html(data);   

                        }
                    }

                });
            });         
            $("#update_shipping_method").submit(function(e) { 
                e.preventDefault();            
                var shipping_methods =  $('input[name="shipping_methods"]:checked').val();
                var uid = jQuery('#uid').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: "company_shipping_method",
                        shipping_methods: shipping_methods,
                        uid: uid
                    },
                    success: function(data) {                        
                            $(".shipping_method_popup").hide();                           
                             $(".res").html(data.message);                                  
                             $(".alertmessage").show();                          
                    }

                });
            });            

            $('.activeEmp_content input[type="checkbox"]').on('change', function() {
                $("#_action").toggle(this.checked);
            });
    

            $('.inactiveEmp_content input[type="checkbox"]').on('change', function() {
                $("#_action_inactive").toggle(this.checked);
            });
  

            


        });

  
        
    
	</script>







