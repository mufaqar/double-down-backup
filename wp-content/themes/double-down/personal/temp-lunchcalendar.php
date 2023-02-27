<?php /* Template Name: Personal-LunchCalednar  */
get_header();
$cal_date = $_REQUEST['send'];
$query_date = $_REQUEST['date'];
$today_date = date("Y-m-d");

echo $today_date;

if ($query_date == '' && $cal_date == '') {
    $today_date = $today_date;
} elseif ($cal_date != '' && $query_date == '') {
    $today_date = $cal_date;
}
elseif ($cal_date == '' && $query_date != '') {
    $today_date = $query_date;
}
elseif ($cal_date != '' && $query_date != '') {
   $today_date = $cal_date;
}
else {
    $today_date = $today_date;
}



$date = new DateTime($today_date);
$weeksid = $date->format("W-m-y");
// echo $today_date;
$today_day_name = date('l', strtotime($today_date));
global $current_user;
wp_get_current_user(); 
?><?php include 'navigation.php';?>
<div class="tab_wrapper">
<?php page_title(); //echo $today_date?>
                    <div class="custom_container">
                            <div class="row">
                                <div class="catering_wrapper mt-5 mb-5 col-md-8">
                                    <div class="catering_menu">
                                        <a href="<?php echo home_url('profile/lunch-calendar'); ?>" class="_active">Enkelt bestillinger</a>
                                        <a href="<?php echo home_url('profile/fixed-delivery'); ?>">Faste bestillinger</a>
                                    </div>
                                    <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                                   <?php if ($query_date != '') {
                                                $query_order = array(
                                                    'post_type' => 'orders',
                                                    'posts_per_page' => 1,
                                                    'order' => 'desc',
                                                    'meta_query' => array(
                                                        'relation' => 'AND',
                                                        array(
                                                            'key' => 'order_day',
                                                            'value' => $today_date,
                                                            'compare' => '=',
                                                        ),
                                                        array(
                                                            'key' => 'user_type',
                                                            'value' => 'Personal',
                                                            'compare' => '=',
                                                        ),
                                                        array(
                                                            'key' => 'order_type',
                                                            'value' => 'Day',
                                                            'compare' => '=',
                                                        ),
                                                        array(
                                                            'key' => 'order_uid',
                                                            'value' => $uid,
                                                            'compare' => '=',
                                                        ),
                                                    ),
                                                );

                                            } else {

                                                $current_date = date("Y-m-d");
                                                $query_order = array(
                                                    'post_type' => 'orders',
                                                    'posts_per_page' => 1,
                                                    'order' => 'desc',
                                                    'meta_query' => array(
                                                        'relation' => 'AND',
                                                        array(
                                                            'key' => 'order_day',
                                                            'value' => $current_date,
                                                            'compare' => '=',
                                                        ),
                                                        array(
                                                            'key' => 'user_type',
                                                            'value' => 'Personal',
                                                            'compare' => '=',
                                                        ),
                                                        array(
                                                            'key' => 'order_type',
                                                            'value' => 'Day',
                                                            'compare' => '=',
                                                        ),
                                                        array(
                                                            'key' => 'order_uid',
                                                            'value' => $uid,
                                                            'compare' => '=',
                                                        ),
                                                    ),
                                                );

                                            }
                                        $postData = new WP_Query($query_order);
                                        if ($postData->have_posts()): while ($postData->have_posts()): $postData->the_post();
                                                $post_id = get_the_ID();                                              
                                                $food_order = get_post_meta(get_the_ID(), 'food_order', true);
                                                $luchbox = array();
                                                $add = array();

                                                foreach ($food_order as $order) {
                                                    foreach ($order as $pro_id => $pro_qty) {
                                                        if (has_term('lunch-boxes', 'menu_types', $pro_id)) {
                                                            $luchbox[] = $pro_qty;
                                                        }
                                                        if (has_term('additionals', 'menu_types', $pro_id)) {
                                                            $add[] = $pro_qty;
                                                        }
                                                    }
                                                }
                                                $total_boxes = array_sum($luchbox);
                                                $total_add = array_sum($add);
                                                ?>
				                                  <p>A Total of <?php echo $total_boxes ?> Boxes,<br> Additions <?php echo $total_add ?>, you pay: <?php echo get_post_meta(get_the_ID(), 'order_total', true); ?> NOK </p>
                                                    <?php endwhile; wp_reset_query();else: ?>
                                            <p>Totale bokser,<br> Du betaler tillegg:  NOK </p>
                                            <?php endif;?>

                                            <div class="calender">
                                                <form action="" method="GET" id="dateform">
                                                <input type="hidden" id="send" name="send" />
                                                     <input type="date"  min="<?php echo date("Y-m-d"); ?>"  name="date" value="<?php if ($query_date == '') {echo date("Y-m-d");} else {
                                                            echo $today_date;
                                                        }
                                                        ?>" id="date">
                                                </form>
                                            </div>

                                    </div>
                                    <form class="weeklyfood" id="weeklyfood" action="#">
                                      <input type="hidden" id="uid" name="uid" value="<?php echo get_current_user_id() ?>" />
                                      <input type="hidden" value="<?php echo $weeksid ?>" id="weekid">
                                    <div class="catering_card_wrapper">
                                    <?php

                                        if ($query_date != '') {
                                            $query_meta = array(
                                                'post_type' => 'menu_items',
                                                'posts_per_page' => -1,
                                                'order' => 'desc',
                                                'meta_query' => array(
                                                    array(
                                                        'key' => 'date',
                                                        'value' => $query_date,
                                                        'compare' => 'LIKE',
                                                        'type' => 'DATE',
                                                    ),
                                                ),
                                            );

                                        } else {
                                            $current_date = date("Y-m-d");
                                            $query_meta = array(
                                                'post_type' => 'menu_items',
                                                'posts_per_page' => -1,
                                                'order' => 'desc',
                                                'menu_types' => 'lunch-boxes',
                                                'meta_query' => array(
                                                    array(
                                                        'key' => 'date',
                                                        'value' => $current_date,
                                                        'compare' => 'LIKE',
                                                        'type' => 'DATE',
                                                    ),
                                                ),
                                            );
                                        }
                                        $postinweek = new WP_Query($query_meta);
                                        if ($postinweek->have_posts()): while ($postinweek->have_posts()): $postinweek->the_post();
                                                $pid = get_the_ID();
                                                $menu_price = get_post_meta(get_the_ID(), 'menu_item_price', true);
                                                $vat = $menu_price / 100 * 15;
                                                $menu_price = $menu_price+$vat;                                                
                                                ?>
				                                            <div class="catering_card _pro_salat">
				                                                <h3><?php the_title()?></h3>
				                                                <p class="mt-3"><?php the_content()?></p>
				                                                <?php show_Allergens()?>
				                                                <div class="d-flex align-items-center justify-content-between _info  mb-3">
				                                                    <div class="d-flex">
				                                                        <div>
				                                                            <strong class="title">Price:</strong>
				                                                            <p><strong>Nok <?php echo $menu_price ?></strong></p>
				                                                        </div>
				                                                        <div style="margin-left: 3rem;">
				                                                            <strong class="title">VAT:</strong>
				                                                            <p><?php echo $vat; ?></p>
				                                                        </div>
				                                                    </div>
				                                                    <div class="product_card ">
				                                                        <button href="" class="btn_primary  select_product_btn id<?php echo $pid; ?>"
				                                                                        onmouseover="showCounter(<?php echo $pid; ?>)">Velg </button>
				                                                                            <div class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid<?php echo $pid; ?>">
				                                                                                <i class="count-down" onclick="handleCountDec(<?php echo $pid ?>)"><img
				                                                                                        src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
				                                                                                        alt="" ></i>
				                                                                                <input type="text" data-id="<?php echo $pid; ?>" value="0"
				                                                                                    class="product-quantity form-control text-center incrDecrCounter" />

				                                                                                <i class="count-up" onclick="handleCountInc(<?php echo $pid ?>)"><img
				                                                                                        src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
				                                                                                        alt="" ></i>
				                                                                            </div>

				                                                    </div>
				                                                </div>
				                                            </div>

				                                            <?php endwhile;
                                                                wp_reset_query();else: ?>
                                                <div class="_pro_card">
                                                                <h3>Sorry no food added yet</h3>
                                                                <p> We did't added menu for this day yet! </p>
                                                            </div>

                                            <?php endif;?>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-5">
                                <aside class="_aside">
                                            <div class="app _calender">
                                                <div class="app__main">
                                                    <div class="calendar">
                                                        <div id="date-datepicker">
                                                            <div>
                                                                <input type="hidden" name="date" value="" id="input_date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </aside>


                            </div>
                        </div>

                            <div class='panels'>
                                <div class='panel launchClander Fixed_delivery' id="weeklyfood">
                                        <div class="d-flex justify-content-between mt-5 mb-4 accessories">
                                            <h2 class="mt-4"><span style="color: #5FB227">2 -</span> Additionals</h2>
                                        </div>
                                        <div class="product_wrapper row mb-4">
                                            <?php query_posts(array(
                                                    'post_type' => 'menu_items',
                                                    'posts_per_page' => -1,
                                                    'order' => 'desc',
                                                    'menu_types' => 'additionals',
                                                        ));
                                                        if (have_posts()): while (have_posts()): the_post();
                                                                $pid = get_the_ID();

                                                                $menu_price = get_post_meta($pid, 'menu_item_price', true);
                                                                $vat = $menu_price / 100 * 15;
                                                                $menu_price = $menu_price+$vat;
                                                                
                                                                
                                                                ?>

				                                                    <div class="col-md-6 col-lg-4 mt-4">
				                                                        <div class="product_card p-4">
                                                                        <?php if ( has_post_thumbnail() ) {
                                                               the_post_thumbnail('product-thumbnail' , array( 'class'  => 'pro_img' ));
                                                            } else { ?>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="Featured Thumbnail" />
                                                        <?php } ?>
				                                                            <h2><?php the_title();?> , NOK <?php echo $menu_price?> </h2>
				                                                            <button href="" class="btn_primary  select_product_btn id<?php echo $pid; ?>"
				                                                                    onmouseover="showCounter(<?php echo $pid; ?>)">Velg </button>
				                                                                        <div class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid<?php echo $pid; ?>">
				                                                                            <i class="count-down" onclick="handleCountDec(<?php echo $pid ?>)"><img
				                                                                                    src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
				                                                                                    alt="" ></i>
				                                                                            <input type="text" data-id="<?php echo $pid; ?>" value="0"
				                                                                                class="product-quantity form-control text-center incrDecrCounter" />

				                                                                            <i class="count-up" onclick="handleCountInc(<?php echo $pid ?>)"><img
				                                                                                    src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
				                                                                                    alt="" ></i>
				                                                                        </div>
				                                                        </div>
				                                                    </div>

				                                            <?php endwhile;
                                                        wp_reset_query();else: ?>
                                            <h2><?php _e('Nothing Found', 'ddd_translate');?></h2>
                                            <?php endif;?>

                                        </div>
                                        <div class="vat">
                                            <h6 class=" d-flex justify-content-end mt-4">* All prices incl. 15% VAT</h6>
                                        </div>

                                        <div class="mt-5 mb-5 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <a href="" class="btn_primary d-block" style="margin-right: 1rem;"> Weekly</a>
                                                <a href="" class="btn_primary btn_sec d-block">Daily</a>
                                            </div>
                                        <div>
                                            

                                        <?php 
                                         $system_order_date =  strtotime(date('Y-m-d'));
                                         $order_date =  strtotime($today_date);
                                         $current_time =  strtotime(wp_date('H:i'));
                                         $order_time = strtotime(date('11:00'));    
                                         $next_order_date = strtotime(date('Y-m-d',strtotime("+1 day")));   
                                         $next_order_date2 = strtotime(date('Y-m-d',strtotime("+2 day")));                                   

                                       


                                        // $order_date  Query DAte
                                        // Systemdate = today date 

                                        //&&  $current_time < $order_time 
                                    
                                     if( $order_date >= $next_order_date  &&  $current_time  <= $order_time  )
                                         {

                                           // echo $today_day_name;

                                            // Query when date date and time is less then 11

                                            ?><input type="submit" id="order" class="btn_primary"  value="Save"/> <?php
                                        }

                                        elseif( $order_date >= $next_order_date2  )
                                        {

                                            ?><input type="submit" id="order" class="btn_primary"  value="Save"/> <?php


                                        }

                                       elseif($order_date > $next_order_date &&  $today_day_name == 'Monday')
                                        {

                                           // echo "Create logic for firday";
                                        
                                            // When date is greator then and time is greator then 11 
                                            if($today_day_name == 'Monday' &&  $order_date > $system_order_date ) {
                                                ?><a href="#" class="btn_primary btn_cancel">Sorry Date Over Friday</a><?php
                                            }
                                            
                                            elseif($next_order_date <= $system_order_date ) {

                                                ?><a href="#" class="btn_primary btn_cancel">Sorry Date Over</a><?php


                                            }
                                            else {
                                                ?><input type="submit" id="order" class="btn_primary"  value="Save"/> <?php

                                            }
                                           
                                          
                                       }
                                       
                                        else
                                        {
                                            
                                            ?><a href="#" class="btn_primary btn_cancel">Sorry Date Over</a><?php
                                        }
                                            
                                         
                                         ?>

                                        

                                     
                                </div>
                        </div>
                    </div>
                                            </form>

                </div>
            </div>

            <?php             
          
            $query_date_order = array(
                'post_type' => 'orders',
                'posts_per_page' => -1,
                'order' => 'asc',
                'meta_query' => array(
                    'relation' => 'AND',                
                    array(
                        'key' => 'order_type',
                        'value' => 'Day',
                        'compare' => '=',
                    ),
                    array(
                        'key' => 'order_uid',
                        'value' => $uid,
                        'compare' => '='
                    ),
                    array(
                        'key' => 'user_type',
                        'value' => 'Personal',
                        'compare' => '='
                    ),
                ),
            );

            $daily_order_dates = array();
            
            $date_Data = new WP_Query($query_date_order);
            if ($date_Data->have_posts()): while ($date_Data->have_posts()): $date_Data->the_post();
            $pid = get_the_ID();
            $order_day = get_post_meta(get_the_ID(), 'order_day', true);
            $timestamp = strtotime($order_day);
            $day = date('d', $timestamp);
            $daily_order_dates[] = $order_day;

           // echo "<h4>";

           //  echo $order_day;
           //  echo "</h4>";
        

            endwhile;wp_reset_query();else:  endif;  


           // print_r($daily_dates);
            
            // foreach($daily_order_dates as $daily_date)
            // {
            //     $req_dates = date_create($daily_date);

            //     $newdate =  date_format($req_dates,"Y,m,d");

            //     echo  $daily_date ."<br/>";
            // }

           
          
          

          
            ?>



        </div>
    </main>





<section class="hideme overlay alertmessage">
    <div class="popup">
        <div class="popup_wrapper">
            <div class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                <img src="<?php bloginfo('template_directory');?>/reources/images/logo.png" class="logo" alt="logo">

                <div class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                    <div class="content mt-5">
                        <div class="right"><img src="<?php bloginfo('template_directory');?>/reources/images/img 3.png" alt=""></div>
                        <h1 class="finished">Finished!</h1>
                        <h2 class="mb-5 mt-5">Your order has beed submitted!</h2>

                    </div>
                </div>

            </div>
            <img src="<?php bloginfo('template_directory');?>/reources/images/red cross.png" alt="" class="_cross">
        </div>
    </div>
</section>


<style>

.event a {
    background-color: #42B373 !important;
    background-image :none !important;
    color: #ffffff !important;
}
</style>







<?php get_footer()?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/reources/js/calender.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($)
   {

    $("#date-datepicker div").on("changeDate", function(event) {
            $("input[type='hidden'][name='date']").val($('#date-datepicker div').datepicker('getFormattedDate'));
            console.log($('#date-datepicker div').datepicker('getFormattedDate'))
           // var date = $('#input_date').val();
           //document.getElementById("send").value = date;
           // $("#dateform").submit();
         
        });
       $('#date').change(function() {
      $(this).closest('form').submit();
       }); 

       const picker = document.getElementById('date');
picker.addEventListener('input', function(e){
  var day = new Date(this.value).getUTCDay();
  if([6,0].includes(day)){
    e.preventDefault();
    this.value = '';
    alert('Weekends not allowed');
  }
});
       

       $('#date-datepicker div').datepicker({
            daysOfWeekDisabled: [0, 6],
            format: "yyyy-mm-dd",
            weekStart : 1,
            autoclose: true,
            todayHighlight: false,
            clearBtn: false,
            startDate: '0d',
            weekStart : 1,
            
   
        
        });
       
		 var specificDates =  [new Date("2022,01,24"), new Date("2023,01,25"), new Date("2023,2,28"), new Date("2023,03,28")];
        var specificDates = [ <?php  foreach($daily_order_dates as $daily_date)
                                {
                                    $req_dates = date_create($daily_date);
                                    $newdate =  date_format($req_dates,"Y,m,d");
                                    echo  'new Date("'. $newdate . '"), ';
                                }
                            ?>  ];




$('#date-datepicker div').datepicker(
          'setDates', specificDates
        );


       

        
   



       

       $('._cross').click(function(){

           $(".hideme").css("display", "none");
       });


       $("#weeklyfood").submit(function(e) {
           e.preventDefault();

            var weekid = jQuery('#weekid').val();
            var uid = jQuery('#uid').val();
            var date = jQuery('#date').val();
            var datas = [];
                var newdata = [];
            $("#weeklyfood .product-quantity").each(function () {
            var productid =  $(this).data('id');
            var value = $(this).val() ;
                if(value >=1) {
                    datas.push( [productid, $(this).val() ]);
                    }
            newdata.push(datas);
            });
            // alert(newdata[0]);
            var menu_items = newdata[0];
            console.log(menu_items);
            var menu_items = menu_items;
            $.ajax(
                {
                    type:"POST",
                    url:"<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: "dailyfood",
                        day : date,
                        menu_items : menu_items,
                        weekid : weekid,
                        usertype : "Personal",
                        order_type : "Day",
                        uid : uid,

                    },
                    success: function(data){

                        if(data.code==0) {
                                    alert(data.message);
                        }
                        else {
                               $(".alertmessage").css("display", "flex");
                               $('.alertmessage').delay(1500).fadeOut();
                              
                        }
                }

            });
       });








   });



</script>

<style>



</style>




</body>

</html>
