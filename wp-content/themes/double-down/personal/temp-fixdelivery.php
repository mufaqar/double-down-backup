<?php /* Template Name: Personal-FixDelivery  */ get_header(); ?>
<?php include('navigation.php'); ?>
<!-- tabs -->
<div class="tab_wrapper">
    <?php page_title() ?>
    <div class="custom_container c2">
        <div class="row">
            <div class="catering_wrapper c2 mt-5 mb-5">
                <div class="catering_menu">
                    <a href="<?php echo home_url('profile'); ?>" class="">Enkelt bestillinger</a>
                    <a href="" class="_active">Faste bestillinger</a>
                </div>
                <div class="calender_wrapper mt-5">
                    <h3>Fixed Delivery</h3>
                    <p>Here you change your regular lunch delivery from us. If you only want to cancel
                        or change the type of lunch on certain days, do so <a href="<?php echo home_url('/contact-us'); ?>">her.</a></p>
                    <br>
                    <hr>
                </div>
                <section class="fixed_delivery mt-4">
                    <form id="delivery_food" method="POST">
                        <div class="row">
                            <?php get_template_part('partials/content', 'fixdelivery'); ?>
                            <div class="col-lg-6 mt-5"> <input type="submit" id="order" class="btn_primary" value="Save Fixed Delivery" /> </div>
                        </div>
                    </form>
                </section>
            </div>
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
                        <a href="<?php echo home_url(''); ?>" class="btn_primary mb-5">View Orders</a>
                    </div>
                </div>

            </div>
            <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
        </div>
    </div>
</section>
<?php get_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".add_roll").click(function() {       
            $(this).parent().addClass("activelist");
            $(this).children().addClass("childlist");
            $(this).siblings().children().toggle();
        });
    })


    var items = [];

    //console.log(foodlist);
    function openfooditem() {
        $(this).attr('data')
        var getBtn = document.querySelector('.add_roll')
        var getId = getBtn.getAttribute('id');
        var food_list = document.querySelector('.food_list')
        food_list.classList.add('_open')
        console.log(getId);
    }


    var mon = [];
    var tue = [];
    var wed = [];
    var thu = [];
    var fri = [];

    var fl_mon = [];
    var fl_tue = [];
    var fl_wed = [];
    var fl_thu = [];
    var fl_fri = [];

    var genratedId

    function reply_click(clicked_id, day) {
        var getAddBtn = document.querySelector('#add_food_'.concat(day));
        var getType = document.querySelector('#lunch_type').value;
        var getFoodInnerHtml = document.getElementById(clicked_id).innerHTML
        var getFoodId = document.getElementById(clicked_id).getAttribute('product-id')
        var fooditem = document.getElementById(clicked_id)
        const html = `<div onclick="handlelist('${day}_id_${getFoodId}')" genratedId="${day}_id_${getFoodId}"><input type="text" class="mt-3 listeditem d-block p-2 w-100" disabled product-id="${getFoodId}" value="${getFoodInnerHtml}" /></div>`
        getAddBtn.insertAdjacentHTML('beforebegin', html);
        // item = document.querySelector(`[genrateId= ${day}_id_${getFoodId}]`);
        $(`[genrateId= ${day}_id_${getFoodId}]`).addClass("hidefromlist");
        // genratedId = document.querySelector(`[genratedId= ${day}_id_${getFoodId}]`);
        

        if (day == 'Monday') {
            fl_mon.push(getFoodId);
            mon.push({
                "day": day,
                "type": getType,
                items: fl_mon
            });
            console.log(mon);
        } else if (day == 'Tuesday') {
            fl_tue.push(getFoodId);
            tue.push({
                "day": day,
                "type": getType,
                items: fl_tue
            });
            console.log(tue);

        } else if (day == 'Wedenday') {
            fl_wed.push(getFoodId);
            wed.push({
                "day": day,
                "type": getType,
                items: fl_wed
            });
        } else if (day == 'Thursday') {

            fl_thu.push(getFoodId);
            thu.push({
                "day": day,
                "type": getType,
                items: fl_thu
            });
        } else if (day == 'Friday') {
            fl_fri.push(getFoodId);
            fri.push({
                "day": day,
                "type": getType,
                items: fl_fri
            });
            console.log(fri);
        }
    }

    jQuery(document).ready(function($) {

        $('._cross').click(function() {
            $(".hideme").css("display", "none");
        });

        $("#delivery_food").submit(function(e) {
            e.preventDefault();
            gl_mon = mon.length;
            gl_tue = tue.length;
            gl_wed = wed.length;
            gl_thu = thu.length;
            gl_fri = fri.length;
            var f_mon = JSON.stringify(mon[gl_mon - 1]);
            var f_tue = JSON.stringify(tue[gl_tue - 1]);
            var f_wed = JSON.stringify(wed[gl_wed - 1]);
            var f_thu = JSON.stringify(thu[gl_thu - 1]);
            var f_fri = JSON.stringify(fri[gl_fri - 1]);
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "fixdelivery",
                    mon: f_mon,
                    tue: f_tue,
                    wed: f_wed,
                    thu: f_thu,
                    fri: f_fri,
                    uid: '1'
                },
                dataType: 'json',
                success: function(data) {
                    if (data.code == 0) {
                        // alert(data.message);
                    } else {
                        $(".overlay").css("display", "flex");

                    }
                }

            });
        });

    });

    function handlelist(li_id){
        var item = document.querySelector(`[genratedId= ${li_id}`);
        item.classList.add("hidefromlist");
        item.remove();
        $(`[genrateId= ${li_id}]`).removeClass("hidefromlist");

    }

   
    
</script>