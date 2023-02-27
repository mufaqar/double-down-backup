<?php
$no_week =  date("Y-W");
$query_week = $_REQUEST['week'];
if($query_week == '') {
    $query_week = $no_week;
}

$week_arr = explode("-", $query_week, 2);
$week=$week_arr[1];
$year=$week_arr[0];
?>
   

<div class="catering_card_wrapper">
            <div class="ajaxload"></div>
            <div class="foodlist">       
                <?php 
                        $dates = getStartAndEndDate($week,$year);
                        $FirstDay = $dates['start_date'] ;
                        $LastDay =  $dates['end_date'];       
                
                        query_posts(array(
                            'post_type' => 'menu_items',
                            'posts_per_page' => -1,
                            'order' => 'desc',  
                            'menus_type' => 'bread-lunch',                                                                                                       
                            'meta_query' => array(
                                array(
                                    'key' => 'date',
                                    'value' => array($FirstDay, $LastDay ),              
                                    'compare' => 'BETWEEN',
                                    'type' => 'DATE'
                                ),
                            )
                        ) ); 

            
                if (have_posts()) :  while (have_posts()) : the_post();
                $date = get_field('date'); ?>
                        <div class="catering_card _pro_salat">
                            <h3><?php the_title() ?> ( <?php $timestamp = strtotime($date); echo  date('D', $timestamp);  ?> | <span><?php echo $date ?> ) </h3>
                            <p class="mt-3"><?php the_content() ?></p>
                            <?php show_Allergens() ?>
                        </div>
                    <?php endwhile;
                    wp_reset_query();
                else : ?>
                   
                    <div class="catering_card _pro_salat">
                            <h3> NO menu added for this day yet </h3>
                            <p class="mt-3"> We are workign on it We will add it soon</p>                            
                        </div>


                <?php endif; ?>
            </div>
            </div>
      