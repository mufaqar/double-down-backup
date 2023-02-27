<?php /* Template Name: Landing  */ 


get_header('landing');
?>
<!-- login section  -->
<main class="main overflow-hidden">
 <div class="position-relative">
 <div class="container ml-auto">
    <div class="d-flex justify-content-between align-content-center align-items-center row">
        <div class="col-md-6 hero_content">
            <h1>Lunsjbokser til din <br> bedrift</h1>
            <p class="mb-4">Smart jobblunsj med full fleksibilitet og kostnadskontroll...</p>
            <a href="#work" class="btn_primary">Les mer</a>
        </div>
        <div class="col-md-6 hero_right">
           
        </div>
    </div>
</div>
        <img src="<?php bloginfo('template_directory'); ?>/reources/images/leaf.png" class="position-absolute top-0 leaf" alt="">
       
        <img src="<?php bloginfo('template_directory'); ?>/reources/images/banner-boll.png" class="position-absolute boll" alt="">
 </div>
</main>


<section class="container landing_contents" id="work">
    <h1>Vi er din 2.0 kantine, <span>digital styring</span> <br>
    for en variert, næringsrik og <br>
        <span>fleksibel jobblunsj</span>
    </h1>
<p>Bedriften sparer tid på administrasjon og får en fleksibel lunsjordning hvor du åpenbart ikke betaler for lunsj de dagene som er kansellerte. Spesielle behov som f eks vegan, vegetar eller allergener kan legges inn. Ha en fin lunsj!</p>
<div class="row landing_step d-flex justify-content-center align-items-center mt-4">
    <div class="col-md-3">
        <div class="head d-flex">
            <div class="icon_wrapper">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/Register.png" alt="Register" >
            </div>
            <div>
                <h3>1. Registrere</h3>
                <p>Registrer bedriften din på få minutter. Bestiller du før kl 11, kan du spise lunsj neste dag.</p>
            </div>
        </div>
        <div class="head d-flex">
            <div class="icon_wrapper">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/add_emp.png" alt="">
            </div>
            <div>
                <h3>2. Legg til ansatte</h3>
                <p>Hver ansatt velger en sine lunsjretter og kan enkelt avbryte, endre eller legge til tilleggsprodukter på Min Side.</p>
            </div>
        </div>
    </div>
    <div class="main_img col-md-6 d-flex justify-content-center align-items-center">
        <img src="<?php bloginfo('template_directory'); ?>/reources/images/center.png" alt="">
    </div>
    <div class="col-md-3">
        <div class="head d-flex">
            <div class="icon_wrapper">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/Register.png" alt="">
            </div>
            <div>
                <h3>3. Velkommen</h3>
                <p>Du hører fra oss etter at du har registrert deg slik at vi sørger for at du får nøyaktig hva du vil. Vi leverer til alle typer bedrifter uansett størrelse.</p>
            </div>
        </div>
        <div class="head d-flex">
            <div class="icon_wrapper">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/Register.png" alt="">
            </div>
            <div>
                <h3>4. Fiks ferdig!</h3>
                <p>Alle ansatte får en stressfri og god lunsj som er god for kroppen, levert til døren innen 11:15 hver dag.</p>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mb-5 mt-5 links">
    <a href="<?php echo home_url('/create-business-agreement'); ?>" class="btn_primary">Start nå</a>
    <a href="<?php echo home_url('/sign-up'); ?>" class="btn_primary btn_sec">Bestille utenfor en bedrift?</a>
</div>
</section>

<div class="mt-5 category_slider">
<h2>Pris NOK 79.35</h2>
<p>Virkelig stort bedrift? Ta kontakt så finner vi en løsning!</p>
<div class="row d-flex align-items-center _slider mt-4">
    <!-- <div class="col-lg-2 categories_links">
        <a href="">	Salad Lunch</a>
        <a href="">Bread Lunch</a>
        <a href="">Wrap Lunch</a>
        <a href="">Additional</a>
      
    </div> -->
    <div class="col-lg-10 _slider_items">
        <div class="autoplay">
        


            <div class="item_wrapper">
                <div><img src="<?php bloginfo('template_directory'); ?>/reources/images/salad.jpg" alt="">						
                    <h5>Salatlunsj</h5>
                </div>
            </div>
            <div class="item_wrapper">
                <div><img src="<?php bloginfo('template_directory'); ?>/reources/images/bread.jpg" alt="">						
                    <h5>Brødlunsj</h5>
                </div>
            </div>
            <div class="item_wrapper">
                <div><img src="<?php bloginfo('template_directory'); ?>/reources/images/wrap.jpg" alt="">						
                    <h5>Wraplunsj</h5>
                </div>
            </div>
            <div class="item_wrapper">
                <div><img src="<?php bloginfo('template_directory'); ?>/reources/images/additional.jpg" alt="">						
                    <h5>Tillegg</h5>
                </div>
            </div>
          
        </div>
        <div class="nav_btn d-flex align-items-center">
            <div class="previous_arrow">
                <img src="<?php bloginfo('template_directory'); ?>/reources//images/left arrow.png" alt="Left Arrow">
            </div>
            <div class="next_arrow">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/right arrow.png" alt="Right arrow">
            </div>
        </div>
        
    </div>
    <div class="mt-3 mb-5 d-flex justify-content-end startNow">
        <a href="<?php echo home_url('/create-business-agreement'); ?>" class="btn_primary">Start nå</a>
    </div>
</div>
</div>



<?php get_footer('landing')?>