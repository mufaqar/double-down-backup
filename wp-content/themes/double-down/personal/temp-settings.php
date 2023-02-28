<?php /* Template Name: Settings (P)  */
get_header();
$uid = get_current_user_id();
$user_info = get_userdata($uid);
//print_r($user_info);
?>
<?php include 'navigation.php';?>
<!-- tabs -->

<div class="tab_wrapper">
    <?php page_title();?>

    <div class='panels'>
        <div class='panel launchClander setting_tab'>
            <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Faste bestillinger</h3>
                    <p><?php echo get_user_meta($uid, 'Personal_days', true); ?> Days</p>
                </div>

            </div>
            <!-- 2nd -->
            <div class="deatil_card d-md-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Leveringsadresse</h3>
                    <p><?php echo get_user_meta($uid, 'profile_delivery_address', true); ?>
                    </p>
                </div>
                <div class="pt-4 pt-md-0">
                    <button id="show_address" class="btn_primary">Oppdatere adresse</button>
                </div>

            </div>
            <!-- 3rd  -->
            <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>E-post for firmakontakt</h3>
                    <p><?php echo get_user_meta($uid, 'compnay_agreement', true); ?></p>
                    <p>
                        <strong><span>Epost : </span></strong>
                        <span class="underline"><?php echo $user_info->user_email ?></span>
                    </p>
                </div>

            </div>

            <!-- 4th  -->
            <div class="deatil_card d-md-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Profil</h3>
                    <p><?php echo get_user_meta($uid, 'compnay_agreement', true); ?><br>
                    <br>
                        <strong><span>Telefon : </span></strong><?php echo get_user_meta($uid, 'profile_delivery_phone', true); ?>
                        |<strong><span>Epost: </span></strong> <?php echo $user_info->user_email ?>

                </div>
                <div class="pt-4 pt-md-0">
                    <button id="show_profile" class="btn_primary">Oppdater profil</button>
                </div>
            </div>

            
           
            <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Endre passord</h3>                   
                </div>
                <div class="">
                    <button id="show_password" class="btn_primary">Endre passord</button>
                </div>
            </div> 

          
           <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Betalingskort</h3>
                    <p> Customer Id : <?php echo get_user_meta($uid, 'customer_id',true); ?></p>
                    <p>**** **** **** <?php $card_number =  get_user_meta($uid, 'card_number',true);

                        echo  substr($card_number,-4);
                    
                    
                    ?></p>

                </div>
                <div class="">
                    <button id="show_payment_detail" class="btn_primary">Endre </button>
                </div>
            </div> 

         
            <div class="deatil_card d-md-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Velg dine allergener og lagre dem</h3>


                    <?php $user_allergies = get_user_meta($uid, 'profile_alergies', true);
foreach ($user_allergies as $key => $user_alery) {

    echo "<p>" . $user_alery . "</p>";
}

?>

                </div>
                <div class="pt-4 pt-md-0">
                    <button id="change_allergies" class="btn_primary">Endre allergener </button>
                </div>
            </div>

            <!-- 7th  -->
            <div class="deatil_card d-md-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Hvordan kan vi nå deg?</h3>

                </div>
                <div class="pt-4 pt-md-0">
                    <button id="show_contact" class="btn_primary">Se Info</button>


                </div>
            </div>

            <!-- 8th  -->
            <div class="deatil_card d-md-flex justify-content-between align-items-center mb-5">
                <div class="info">
                    <h3>Betaling og ordreinfo</h3>
                </div>
                <div class="pt-4 pt-md-0">
                <button id="show_invoice" class="btn_primary">Betalingsdetaljer</button>
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
<section class="hideme overlay delivery_address_popup">
    <div class="popup">
        <form class="profile_deliver_address" id="profile_deliver_address" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Leveringsadresse</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Leveringsadresse</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_delivery_address" id="profile_delivery_address" value="<?php echo get_user_meta($uid, 'profile_delivery_address', true); ?>">
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                        <!-- <img src="<?php bloginfo('template_directory');?>/reources/images/pin.png" alt=""> -->
                    </div>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Lagre" />
                </div>

                <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>


<section class="hideme overlay fast_leaving_popup">
    <div class="popup">
        <form class="profile_deliver_fast" id="profile_deliver_fast" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Fast Levering</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Days</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_delivery_days" id="profile_delivery_days" placeholder="<?php echo get_user_meta($uid, 'profile_delivery_days', true); ?>">
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">

                    </div>
                </div>


                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Lagre" />
                </div>

                <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>

<section class="hideme overlay show_profile_popup">
        <div class="popup">
                <form class="profile_details" id="profile_details" action="#">
                    <div class="popup_wrapper">
                        <h3 class="ad_productss">Profildetaljer</h3>
                        <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                            <label>Telefon </label>
                            <div class="_field d-flex justify-content-between align-items-center">
                                <input type="text" name="profile_delivery_phone" id="profile_delivery_phone" placeholder="<?php echo get_user_meta($uid, 'profile_delivery_phone', true); ?>">
                            </div>
                        </div>
                        <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                            <label>E-post</label>
                            <div class="_field d-flex justify-content-between align-items-center">
                                <input type="text" name="profile_email" id="profile_email" placeholder="<?php echo $user_info->user_email ?>" value="<?php echo $user_info->user_email ?>" disabled>
                            </div>
                        </div>

                        <div class="mt-5">
                            <input type="submit" class="btn_primary" value="Lagre" />
                        </div>

                        <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross">
                    </div>
                </form>
            </div>
</section>



<section class="hideme overlay show_password_popup">
    <div class="popup">
            <form class="profile_password" id="profile_password" action="#">
                <div class="popup_wrapper">
                    <h3 class="ad_productss">Endre passord</h3>                
                    <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                        <label>Skriv inn nytt passord</label>
                        <div class="_field d-flex justify-content-between align-items-center">
                            <input type="text"  name="new_password" id="new_password" placeholder="Skriv passord her"  >
                        </div>
                    </div> 
                    <div class="mt-5">
                        <input type="submit" class="btn_primary" value="Oppdater passord" />
                    </div>
                    <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross">
                </div>
            </form>
        </div>
</section>



<section class="hideme overlay show_allergies_popup">
    <div class="popup">
        <form class="profile_allergies_form" id="profile_allergies_form" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Endre allergener </h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">

                <section class="w-100">


               <select id="choices-alergies" placeholder="Velg allergener" multiple>

                  <?php
                        $allergies_tax = get_terms(array('taxonomy' => 'allergies', 'hide_empty' => false));
                        foreach ($allergies_tax as $allergy) {
                            $type_slug = $allergy->slug;
                            $type_name = $allergy->name;?>
                                                                <option value="<?php echo $type_slug; ?>"><?php echo $type_name; ?> </option>
                                                                    <?php
                        }
                        ?>
                        </select>

                        <section>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Lagre" />
                </div>
                <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>



<section class="hideme overlay show_contact_popup">
    <div class="popup">
        <form class="profile_contact" id="profile_contact" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss"> Hvordan kan vi nå deg?</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                       <div class="week_days">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex align-items-left">
                                    <input type="checkbox" id="via_lunch" name="contact" value="lunch" checked>
                                    <label for="via_lunch">Jeg vil gjerne motta relevant informasjon om produkter og tjenester fra Double Down Dish. Dette kan for eksempel være generell informasjon om lunsjmeny og næringsinnhold, nyheter og endringer, tilbud, kampanjer, undersøkelser osv. Vi lover å ikke plage deg for tidlig!
</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="weekday-2" name="contact" value="Tuesday" checked>
                                    <label for="weekday-2">Uavhengig av eventuell markedsføringsreservasjon vil du motta ordrebekreftelse og leveringsinformasjon på e-post og/eller SMS.</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="via_email" name="contact" value="Email" checked>
                                    <label for="via_email">En ukentlig e-post med bestillingene dine for neste uke. Har du et aktivt kundeforhold, men ikke har lagt inn bestillinger, får du oversikt over menyen og påminnelse om å bestille. Send SMS når ingen er der for å motta lunsjen din.
</label>
                                </div>

                            </div>
                        </div>
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">

                </div>
                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Lagre" />
                </div>
                <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>


<section class="hideme overlay payment_detail_popup">
    <div class="popup">
        <form class="update_payment" id="update_payment" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Betalingsdetaljer</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Kortnummer</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="card_number" id="card_number" value="<?php echo get_user_meta($uid, 'card_number', true); ?>" required>
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                    </div>
                </div>                
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Utløpsdato</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="expiry_date" id="expiry_date" value="<?php echo get_user_meta($uid, 'expiry_date', true); ?>" required>
                    </div>
                </div>

                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Utløpsmåne</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="expiry_month" id="expiry_month" value="<?php echo get_user_meta($uid, 'expiry_month', true); ?>" required>
                    </div>
                </div>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>CSV</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="card_csv" id="card_csv" value="<?php echo get_user_meta($uid, 'card_csv', true); ?>" required>
                    </div>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Lagre" />
                </div>
                <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>


<section class="hideme overlay agreement">
    <div class="popup">
        <form class="update_agreement" id="update_agreement" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Details of the agreement</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Agreement Name</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="compnay_agreement" id="compnay_agreement" placeholder="<?php echo get_user_meta($uid, 'compnay_agreement', true); ?>">
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                    </div>
                </div>
                
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Starting Date</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="date" name="starting_date" id="starting_date" placeholder="<?php echo get_user_meta($uid, 'starting_date', true); ?>">
                    </div>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Lagre" />
                </div>

                <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross">
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
                                            <th scope="col">Brukertype</th>    
                                            <th scope="col">Pris</th> 
                                            <th scope="col">Handling</th>
                                    
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                global $current_user;
                                                wp_get_current_user();
                                                query_posts(array(
                                                    'post_type' => 'invoice',
                                                    'posts_per_page' => -1,
                                                    'order' => 'desc',
                                                    'meta_query' => array(
                                                        'relation' => 'AND',
                                                        array(
                                                            'key' => 'user_type',
                                                            'value' => 'Personal',
                                                            'compare' => '=',
                                                        ),
                                                        array(
                                                            'key' => 'invoice_uid',
                                                            'value' => $current_user->ID,
                                                            'compare' => '=',
                                                        ),
                                                    ),

                                                ));

                                                if (have_posts()): while (have_posts()): the_post();?>
                                                <tr>
                                                <td scope="row"><?php the_title()?></td>
                                                <td><?php echo get_post_meta(get_the_ID(), 'inovice_week', true); ?>  
                                            -<?php echo get_post_meta(get_the_ID(), 'inovice_year', true); ?>   </td>
                                               
                                                <td>Personlig</td>
                                                <td><?php echo get_post_meta(get_the_ID(), 'total_price', true); ?></td>

                                                <td><button data-week="<?php echo get_post_meta(get_the_ID(), 'inovice_week', true) ?>" 
                                                data-year="<?php echo get_post_meta(get_the_ID(), 'inovice_year', true) ?>"  class="show_invoice_detail btn_primary">Detaljer</button></td>
                                           
                                                </tr>
                                                <?php endwhile;
                                                    wp_reset_query();else: ?>
                                                    <tr>  <td colspan="6"><?php _e('No Invoice  Found', 'ddd_translate');?></td></tr>
                                                    <?php endif;?>
                                        </tbody>
                                    </table>
                                </div>
                                <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross ">
                </div>
            </div>
        </div>
    </section>

    <section class="hideme  overlay invoice_detail_popup">
         <div class="popup">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Fakturadetaljer</h3>
                    <div class="w-100 ajax_invoice"> </div>
                    <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross ">
            </div>
    </section>



    <section class="hideme alertmessage">
        <div class="popup">
            <div class="popup_wrapper">
                <div class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                    <img src="<?php bloginfo('template_directory');?>/reources/images/logo.png" class="logo" alt="logo">
                    <div class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                        <div class="content mt-5">
                            <div class="right"><img src="<?php bloginfo('template_directory');?>/reources/images/img 3.png" alt=""></div>
                            <h1 class="finished">Finished!</h1>
                            <h2 class="mb-5 mt-5"><div class="res">Load Ajax Data</div></h2>

                        </div>
                    </div>

                </div>
                <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section>



<script type="text/javascript">
    var button = document.querySelector('.checkout-button');
    button.addEventListener('click', function () {

      var request = new XMLHttpRequest();
      var order_id = this.getAttribute("data-id");
      alert(order_id);

      request.open('GET', '<?php echo get_template_directory_uri() ?>/create-payment.php'+ "?uid=" + order_id+ "", true);
      request.onload = function () {
        const data = JSON.parse(this.response);
        if (!data.paymentId) {
          console.error('Error: Check output from create-payment.php');
          return;
        }
        console.log(this.response);
        console.log(data);
        window.location = '<?php echo home_url(); ?>/checkout/?paymentId=' + data.paymentId;
      }
      request.onerror = function () { console.error('connection error'); }
      request.send();
    });






   </script>





<?php get_footer();?>

<link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/reources/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">



    jQuery(document).ready(function($) {
    var multipleCancelButton = new Choices('#choices-alergies', {
    removeItemButton: true,
    maxItemCount:10,
    searchResultLimit:5,
    renderChoiceLimit:5
    });

        $('#show_address').click(function() {
            $(".delivery_address_popup").css("display", "block");
        });
        $('#showfast_leaving').click(function() {
            $(".fast_leaving_popup").css("display", "block");
        });

        $('#show_profile').click(function() {
            $(".show_profile_popup").css("display", "block");
        });

        $('#show_password').click(function() {
            $(".show_password_popup").css("display", "block");
        });        
        $('#show_contact').click(function() {
            $(".show_contact_popup").css("display", "block");
        });

        $('#change_allergies').click(function() {
            $(".show_allergies_popup").css("display", "block");
        });

        $('#show_payment_detail').click(function() {
            $(".payment_detail_popup").css("display", "block");
        });

        $('#show_invoice').click(function() {
            $(".invoice").css("display", "block");
        });      

        $('.show_invoice_detail').click(function() {
            $(".invoice").hide();
            $(".invoice_detail_popup").css("display", "block");
            var week = $(this).attr('data-week')
            var year = $(this).attr('data-year')
            var uid = jQuery('#uid').val();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "get_invoice_detail_personal",
                    week: week,
                    year: year,
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

        $('.hidepop').click(function(){

           $(".invoice_detail_popup").css("display", "none");
       });





        $('._cross').click(function(){

           $(".hideme").css("display", "none");
       });

       $("#profile_details").submit(function(e) {
            e.preventDefault();

            var profile_delivery_phone = jQuery('#profile_delivery_phone').val();

            var uid = jQuery('#uid').val();

            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_details",
                    profile_delivery_phone: profile_delivery_phone,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {

                               $(".show_profile_popup").hide();
                               $(".res").html(data.message);
                               $(".alertmessage").show();

                    }
                }

            });

        });


        $("#profile_password").submit(function(e) {
            e.preventDefault();
            var profile_password = jQuery('#new_password').val();
            var uid = jQuery('#uid').val();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_password",
                    profile_password: profile_password,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {

                               $(".show_password_popup").hide();
                               $(".res").html(data.message);
                               $(".alertmessage").show();

                    }
                }

            });

        });

        $("#profile_deliver_address").submit(function(e) {
            e.preventDefault();
            var profile_delivery_address = jQuery('#profile_delivery_address').val();
            var profile_delivery_phone = jQuery('#profile_delivery_phone').val();
            var profile_delivery_email = jQuery('#profile_delivery_email').val();
            var uid = jQuery('#uid').val();

            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_deliver_address",
                    profile_delivery_address: profile_delivery_address,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {

                               $(".delivery_address_popup").hide();
                               $(".res").html(data.message);
                               $(".alertmessage").show();

                    }
                }

            });

        });
        $("#profile_deliver_fast").submit(function(e) {
            e.preventDefault();
            var profile_delivery_days = jQuery('#profile_delivery_days').val();
            var uid = jQuery('#uid').val();

            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_deliver_fast",
                    profile_delivery_days: profile_delivery_days,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {
                        alert(data.message);


                    }
                }

            });

        });

        $("#profile_contact").submit(function(e) {
            e.preventDefault();
            var profile_contact = jQuery('#contact_detail').val();
            var uid = jQuery('#uid').val();

            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_contact",
                    profile_contact: profile_contact,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {


                    } else {


                               $(".show_contact_popup").hide();
                               $(".res").html(data.message);
                               $(".alertmessage").show();

                    }
                }

            });

        });

        $("#profile_allergies_form").submit(function(e) {
            e.preventDefault();
            var choices_alergies = jQuery('#choices-alergies').val();

            var uid = jQuery('#uid').val();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_allergies_other",
                    choices_alergies: choices_alergies,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {
                               $(".show_allergies_popup").hide();
                               $(".res").html(data.message);
                               $(".alertmessage").show();

                    }
                }

            });

        });


        $("#update_agreement").submit(function(e) {
            e.preventDefault();
            var compnay_agreement = jQuery('#compnay_agreement').val();
            var starting_date = jQuery('#starting_date').val();
            var uid = jQuery('#uid').val();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "update_agreement",
                    compnay_agreement: compnay_agreement,
                    starting_date: starting_date,
                    uid: uid
                },
                success: function(data) {

                    $(".show_contact_popup").hide();
                               $(".res").html(data.message);
                               $(".alertmessage").show();
                }

            });

        });

        $("#update_payment").submit(function(e) {
            e.preventDefault();
            var card_number = jQuery('#card_number').val();
            var expiry_date = jQuery('#expiry_date').val();
            var expiry_month = jQuery('#expiry_month').val();
            var card_csv = jQuery('#card_csv').val();
            var uid = jQuery('#uid').val();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "update_payment",
                    card_number: card_number,
                    expiry_date: expiry_date,
                    expiry_month: expiry_month,
                    card_csv: card_csv,
                    uid: uid
                },
                success: function(data) {

                    $(".payment_detail_popup").hide();
                               $(".res").html(data.message);
                               $(".alertmessage").show();
                }

            });

        });




    });



</script>