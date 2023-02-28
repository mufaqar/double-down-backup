<?php /* Template Name: Signup */ 
get_header();
reddirectProfile();
?>
<main class="business_agreement">    
    <div class="agreement_wrapper d-flex position-relative justify-content-center flex-column align-items-center p-4">
        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/logo.png" class="logo" alt="logo" /></a>
        <form class="addprofile" id="addprofile"> 
            <div class="first_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/left arrow.png" class="arrow position-absolute" alt="back arrow" /></a>
                <h2 class="mt-5">DIn informasjon</h2>
                <p>Her kan du registrere din profil som individuell bruker utenom en bedriftsavtale men fortsatt ha mulighet til å bestille lunsj, catering eller møtemat.  </p>
                
                <div class="mt-5 w-500">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Henvisningsnavn</label>
                        <input type="text" class="form-control" id="referral"  placeholder="Hvem anbefalte deg?" value="" />
                    </div>
                    <div class="form-group  mt-3">
                        <label for="exampleInputEmail1">Fullt navn</label>
                        <input type="text" class="form-control" id="name"  placeholder="Ditt navn" value="" required  />
                    </div>
                    <div class="form-group  mt-3">
                        <label for="exampleInputEmail1">E-post</label>
                        <input type="email" class="form-control" id="username"  placeholder="Skriv din epost" value=""  required  />
                    </div>
                    <div class="form-group  mt-3 mb-5">
                        <label for="exampleInputEmail1">Telefon</label>
                        <input type="number" class="form-control" id="phone"  placeholder="Skriv ditt telefonnummer" value=""   />
                    </div>

                    <div class="tou mt-5">
                        <h2 class="">
                        Vilkår for bruk, personvern og relevant informasjon

                        </h2>
                        <p style="margin-top: -.8rem;" class="mb-4">
                        Jeg vil gjerne motta relevant informasjon om produkter og tjenester fra Double Down Dish. Dette kan være informasjon, for eksempel om lunsjmenyer og næringsinnhold, nyheter og endringer, tilbud, kampanjer, undersøkelser osv. Vi lover å ikke plage deg for tidlig.

                        </p>
                        <div class="d-flex align-items-center mb-5">
                            <p class="">
                                <input type="radio" id="yes" name="radio-group" checked>
                                <label for="yes">Ja, takk</label>
                            </p>
                            <p style="margin-left: 2rem;">
                                <input type="radio" id="test2" name="radio-group">
                                <label for="test2">Nei, takk</label>
                            </p>
                        </div>

                    </div>

                    <button type="next" class="btn_primary d-block next" >Fullfør</button>
                </div>
            </div>
            </form>
            <!-- finish step  -->
            <div id="last_step">
            <div class="finish_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center" >            
                <div class="content mt-5">
                    <div class="right">
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt="" />
                    </div>
                    <h1 class="finished">Ferdig!</h1>
                    <h2 class="looking">Vi gleder oss til å lage lunsj til deg</h2>
                    <p class="find_information">
                    Vi har nå sendt deg en e-post hvor du finner informasjon om hvordan du logger inn og administrerer din bedrift og dine bestillinger. Bedrifter mottar en faktura annenhver uke. </p>
                    <h3 class="employees_receive">
                    Ansatte mottar den på slutten av hver uke
                    </h3>
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
        $("#addprofile").submit(function(e) {        
            e.preventDefault();          
            var username = jQuery('#username').val();
            var name = jQuery('#name').val();
            var referral = jQuery('#referral').val();	
            var phone = jQuery('#phone').val();	 
            $.ajax(
                {
                    type:"POST",
                    url:"<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: "company_signup",
                        username : username,
                        name : name,
                        referral : referral,
                        phone : phone
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




