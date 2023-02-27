<?php
$week = [];
$saturday = strtotime('monday this week');
$i = 0;
foreach (range(0, 4) as $day) {
    $week[] = date("Y-m-d", (($day * 86400) + $saturday));
    $today_date =  $week[$i];
    $i++;
    $timestamp = strtotime($today_date);
    $today_day = date('l', $timestamp); ?>
    <div class="col-lg-6">
        <div class="fd_wrapper p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h5><strong> <?php echo $today_day ?></strong></h5>
                <p>You pay: <span>NOK <span id="price_pay"></span></span> <br>VAT: <span>80</span></p>
            </div>
            <div class="catering_form">
                <div class="_form mt-2">
                    <input type="hidden" value="<?php echo $today_date ?>" id="day">
                    <div>
                        <label for="">Lunch type</label>
                        <div class="_select">
                            <select id="lunch_type">
                                <?php
                                $menu_types = get_terms(array('taxonomy' => 'menu_food_type', 'hide_empty' => false));
                                foreach ($menu_types as $menu_type) {
                                    $type_slug = $menu_type->slug;
                                    $type_name = $menu_type->name; ?>
                                    <option data="<?php echo $today_day ?>" value="<?php echo $type_slug ?>"><?php echo $type_name ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <img src="<?php bloginfo('template_directory'); ?>/reources/images/down-arrow.png" alt="">
                        </div>
                    </div>
                    <div>
                        <label class="mt-3" for="">Lunch Accessories</label>
                    </div>

                   

                    <div class="row mt-3 mb-3 add_foods_to_list ">
                        <div id="add_food_<?php echo $today_day ?>" class="add_roll mt-3">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <div class="top_wrapper">
                            <div class="hidememe food_list_<?php echo $today_day ?> mt-3">
                                Load HTML                       
                               
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>


<?php  }    ?>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <script type="text/javascript">
    $(document).ready(function() {
        
        $("#lunch_type").on('change', function() {
            var lunch_type = this.value ;
            var lunch_day =  $(this).find(':selected').attr('data');          
            console.log(lunch_day);
            $.ajax({
                type:"GET",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "get_type_products",
                    lunch_type: lunch_type,
                    lunch_day : lunch_day
                },           
                success: function(data) {
                    if (data.code == 0) {
                        alert(data.message);
                    } else {
                       // $(".overlay").css("display", "flex");
                       $("food_list").html(data);

                    }
                }

            });
           
        });
    })
</script>