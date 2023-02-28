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
                <p>NB! Er selskapet du jobber for allerede registrert? Spør gjerne en administrator om bedriftsavtalen for en invitasjon til å bli med.
</p>
                <div class="pl-4 pr-4">
                    <h2 class="">Opprett forretningsavtale</h2>
                    <div class="form-group w-100 ">
                        <label for="compnay_name">Firmanavn</label>
                        <input type="text" class="form-control" id="compnay_name" placeholder="Firmanavn" required >
                    </div>
                    <div class="form-group w-100 mt-2">
                        <label for="compnay_name">Firmanummer</label>
                        <input type="text" class="form-control" id="compnay_number" placeholder="Firmanummer" required >
                    </div>

                    <div class="form-group w-100 mt-3 mb-5">
                        <label for="compnay_delivery_address">Leveringsadresse</label>
                        <textarea class="form-control" id="compnay_delivery_address" rows="3"
                            placeholder="Legg til leveringsadresse"></textarea>
                        <!-- <input type="text" class="form-control" id="compnay_agreement" 
                            placeholder="Agreement Title" > -->
                    </div>

                    <a type="next" class="btn_primary d-block next" onclick="stepOne()">Fortsett</a>
                </div>
            </div>

            <!-- step 2  -->
            <div class="secound_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/left arrow.png" class="arrow position-absolute" alt="back arrow"
                    onclick="backToStepOne()">

                <div class="pl-4 inner-content pr-4">
                    <h2 class=""> Tilpass bedriftsavtale for:</h2>
                    <p class="align-self-start">Velg om bedriften skal dekke noen av de ansattes lunsj.</p>
                    <div class="launch mt-3 mb-4 form-group w-100 d-lg-flex align-items-center">
                        <input type="text" class="form-control" id="lunch_benefit" 
                            placeholder="Bedriften betaler 20">
                        <select name="lunch_benfit_type" id="lunch_benfit_type" class="">
                            <option value="%">%</option>
                            <option value="$">NOK</option>
                        </select>
                        <p class="text-nowrap">av lunsjen til hver ansatt?</p>
                    </div>
                    <h6>Første mulige startdato</h6>
                    <p class="text">Ansatte vil ikke automatisk starte opp på disse dataene, men ingen kan starte opp tidligere enn den spesifikke datoen
</p>
                    <div class="form-group w-100 mt-3 mb-5">
                        <input type="text" class="form-control" id="starting_date" value="<?php echo $order_date;?>"
                            placeholder="<?php  echo $order_date; ?>" disabled>
                        <p class="invite">Inviter flere fra jobb til bedriftsavtalen
</p>
                        <h6>Det er enkelt å legge til flere ansatte senere også</h6>
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

                    <a type="next" class="btn_primary d-block next" onclick="stepTwo()">Fortsett</a>
                </div>
            </div>

            <!-- step 3  -->
            <div
                class="third_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/left arrow.png" class="arrow position-absolute" alt="back arrow"
                    onclick="backToStepTwo()">
                <div class="pl-4 third pr-4">
                    <p> Som bedriftsadministrator må du ha egen bruker for å logge inn. Da får du full tilgang til bedriftsavtalen , og kan legge til flere administrator.</p>
                    <h2 class="">Din informasjon</h2>
                    <div class="form-group w-100">
                        <label for="name">Fullt navn</label>
                        <input type="text" class="form-control" id="name" placeholder="Ditt navn" value="" required >
                    </div>
                    <div class="form-group w-100 mt-3">
                        <label for="username">E-post</label>
                        <input type="text" class="form-control" id="username" placeholder="Din e-post adresse" value="" required>
                    </div>
                    <div class="form-group w-100 mt-3">
                        <label for="phone">Telefon</label>
                        <input type="text" class="form-control" id="phone" placeholder="Ditt telefonnummer" value="">
                    </div>

                    <div class="pinfo mt-5">
                        <h2 class="">Vilkår for bruk, personvern og relevant informasjon</h2>
                        <p class="text"> 
                        Jeg vil gjerne motta relevant informasjon om produkter og tjenester fra Double Down Dish. Dette kan være informasjon, for eksempel om lunsjmenyer og næringsinnhold, nyheter og endringer, tilbud, kampanjer, undersøkelser osv. Vi lover å ikke plage deg for tidlig.

                        </p>
                    </div>

                    <div class="d-flex align-items-center mb-5">
                        <p class="">
                            <input type="radio" id="test1" name="radio-group" checked>
                            <label for="test1">Ja, takk</label>
                        </p>
                        <p style="margin-left: 2rem;">
                            <input type="radio" id="test2" name="radio-group">
                            <label for="test2">Nei, takk</label>
                        </p>
                    </div>

                    <button type="next" class="btn_primary d-block next">Fullfør</button>
                </div>
            </div>

      
        </form>
        <div id="last_step">
            <div  class="finish_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">            
                <div class="content mt-5">
                    <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                    <h1 class="finished">Ferdig!</h1>
                    <h2 class="looking">Vi gleder oss til å lage lunsj til deg</h2>
                    <p class="find_information">
                    Vi har nå sendt deg en e-post hvor du finner informasjon om hvordan du logger inn og administrerer din bedrift og dine bestillinger. Bedrifter mottar en faktura annenhver uke.</p>
                    <h3 class="employees_receive">Ansatte vil bli trukket fra registrert betalingskort hver ende av lunsjuken.</h3>
                    <a href="<?php echo home_url(); ?>" class="btn_primary mb-5">Gå til startside</a>
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







