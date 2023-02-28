<?php
include_once('login.php');
include_once('register.php');
include_once('cpts.php');
include_once('class-wp-bootstrap-navwalker.php');
include_once('ajax_request.php');
include_once('ajax_request_admin.php');

//add_role( 'company', 'Company', array( 'read' => true, 'level_0' => true ) );
//add_role( 'personal', 'Personal', array( 'read' => true, 'level_0' => true ) );

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}



add_filter( 'manage_orders_posts_columns', 'set_custom_edit_orders_columns' );    
add_action( 'manage_orders_posts_custom_column' , 'custom_orders_column', 10, 2 );
function set_custom_edit_orders_columns($columns) {    
    unset( $columns['author'] );   
    $columns['order_type'] = 'Order Type';
    $columns['order_day'] = 'Order Day';
    $columns['order_week'] = 'Order Week';
    $columns['user_type'] = 'User Type';
    $columns['order_uid'] = 'Order By';
    $columns['order_total'] = 'Order Price';
    $columns['order_status'] = 'Payment Status';  
    return $columns;    
}

function custom_orders_column( $column, $post_id ) {   
    global $post;
    switch ( $column ) {
        case 'order_status' :
            if(get_field( "order_status", $post_id )) {
                echo get_field( "order_status", $post_id );
            } else {
                echo 0;
            }
        break;

        case 'order_type' :
            if(get_field( "order_type", $post_id )) {
                echo get_field( "order_type", $post_id ); 
              


            } else {
                echo 0;
            }
        break;
        
        case 'order_day' :
            if(get_field( "order_day", $post_id )) {
                echo get_field( "order_day", $post_id ); 
              



            } else {
                echo 0;
            }
        break;

        case 'order_week' :
            if(get_field( "order_week", $post_id )) {
                echo get_field( "order_week", $post_id ); 
              



            } else {
                echo 0;
            }
        break;
        case 'user_type' :
          if(get_field( "user_type", $post_id )) {            
             echo   get_field( "user_type", $post_id );
             
          } else {
              echo 0;
          }
      break; 
      break;  
        case 'order_total' :
          if(get_field( "order_total", $post_id )) {
              echo " NOK " .get_field( "order_total", $post_id );
          } else {
              echo 0;
          }
      break; 
      break;  
        case 'order_uid' :
          if(get_field( "order_uid", $post_id )) {           
              $uid =  get_field( "order_uid", $post_id );
              $the_user = get_user_by( 'id', $uid ); // 54 is a user ID
              echo $the_user->user_email;
          } else {
              echo 0;
          }
      break;    
    }   
}

function my_column_register_sortable( $columns ) {
     $columns['order_status'] = 'order_status';
    $columns['order_type'] = 'order_type';
    return $columns;
}

add_filter("manage_edit-orders_sortable_columns", "my_column_register_sortable" );







// For invoices




add_filter( 'manage_invoice_posts_columns', 'set_custom_edit_invoice_columns' );    
add_action( 'manage_invoice_posts_custom_column' , 'custom_invoice_column', 10, 2 );
function set_custom_edit_invoice_columns($columns) {    
    unset( $columns['author'] );   
  
    
    $columns['inovice_week'] = ' Week';
    $columns['inovice_year'] = ' Year';
    $columns['user_type'] = 'User Type';
    $columns['order_uid'] = 'Invoice By';
    $columns['order_total'] = 'Invoice Price';
    $columns['order_status'] = 'Invoice Status';  
    return $columns;    
}

function custom_invoice_column( $column, $post_id ) {   
    global $post;
    switch ( $column ) {
        case 'inovice_year' :
            if(get_field( "inovice_year", $post_id )) {
                echo get_field( "inovice_year", $post_id );
            } else {
                echo 0;
            }
        break;
        case 'inovice_week' :
            if(get_field( "inovice_week", $post_id )) {
                echo get_field( "inovice_week", $post_id ); 
            } else {
                echo 0;
            }
        break;
        
        case 'order_status' :
            if(get_field( "invoice_status", $post_id )) {
                echo get_field( "invoice_status", $post_id );
            } else {
                echo 0;
            }
        break;

        case 'order_week' :
            if(get_field( "order_week", $post_id )) {
                echo get_field( "order_week", $post_id ); 
            } else {
                echo 0;
            }
        break;
        case 'user_type' :
          if(get_field( "user_type", $post_id )) {            
             echo   get_field( "user_type", $post_id );
             
          } else {
              echo 0;
          }
      break; 
      break;  
        case 'order_total' :
          if(get_field( "total_price", $post_id )) {
              echo " NOK " .get_field( "total_price", $post_id );
          } else {
              echo 0;
          }
      break; 
      break;  
        case 'order_uid' :
          if(get_field( "invoice_uid", $post_id )) {           
              $uid =  get_field( "invoice_uid", $post_id );
              $the_user = get_user_by( 'id', $uid ); // 54 is a user ID
              echo $the_user->user_email;
          } else {
              echo 0;
          }
      break;    
    }   
}

function my_invoice_register_sortable( $columns ) {
     $columns['order_status'] = 'order_status';
    $columns['order_type'] = 'order_type';
    return $columns;
}

add_filter("manage_edit-invoice_sortable_columns", "my_invoice_register_sortable" );








add_filter( 'manage_catering_posts_columns', 'set_custom_edit_catering_columns' );    
add_action( 'manage_catering_posts_custom_column' , 'custom_catering_column', 10, 2 );
function set_custom_edit_catering_columns($columns) {    
    unset( $columns['author'] );   
 
    $columns['user_type'] = 'User Type';
    $columns['order_uid'] = 'Order By';
    $columns['order_people'] = 'People';

    return $columns;    
}

function custom_catering_column( $column, $post_id ) {   
    global $post;
    switch ( $column ) {
        case 'order_status' :
            if(get_field( "order_status", $post_id )) {
                echo get_field( "order_status", $post_id );
            } else {
                echo 0;
            }
        break;

        case 'order_type' :
            if(get_field( "order_type", $post_id )) {
                echo get_field( "order_type", $post_id );
            } else {
                echo 0;
            }
        break;  
        case 'user_type' :
          if(get_field( "user_type", $post_id )) {
              echo get_field( "user_type", $post_id );
          } else {
              echo 0;
          }
      break; 
      break;  
        case 'order_people' :
          if(get_field( "people", $post_id )) {
              echo get_field( "people", $post_id );
          } else {
              echo 0;
          }
      break; 
      break;  
        case 'order_uid' :
          if(get_field( "order_uid", $post_id )) {
              echo get_field( "order_uid", $post_id );
          } else {
              echo 0;
          }
      break;    
    }   
}

function catering_column_register_sortable( $columns ) {
     $columns['order_status'] = 'order_status';
    $columns['order_type'] = 'order_type';
    return $columns;
}

add_filter("manage_edit-catering_sortable_columns", "catering_column_register_sortable" );



/// Food Order WP admin 


add_filter( 'manage_menu_items_posts_columns', 'set_custom_edit_menu_items_columns' );    
add_action( 'manage_menu_items_posts_custom_column' , 'custom_menu_items_column', 10, 2 );
function set_custom_edit_menu_items_columns($columns) {    
    unset( $columns['author'] );   
 
    $columns['order_date'] = 'Lunch Date';


    return $columns;    
}

function custom_menu_items_column( $column, $post_id ) {   
    global $post;
    switch ( $column ) {
        case 'order_date' :
            if(get_field( "date", $post_id )) {
                echo get_field( "date", $post_id );
            } else {
                echo 0;
            }
        break;

       
       
    }   
}

function menu_items_column_register_sortable( $columns ) {
     $columns['order_date'] = 'order_date';
    return $columns;
}

add_filter("manage_edit-menu_items_sortable_columns", "menu_items_column_register_sortable" );


function  page_title() {

    ?> <div class='toggle mb-5'>
            <div class='tabs'>
                <div class='tab active'><?php the_title()?></div>           
            </div>
    </div><?php
}



function my_get_current_user_roles() {
 
    if( is_user_logged_in() ) {
         $user = wp_get_current_user();   
      $roles = ( array ) $user->roles;
      return array_values($roles);
   
    } else {
   
      return array();
   
    }
   
  }

    function profile_user_nav() {   
   
    $user_role_arr =  my_get_current_user_roles();
    $c_user_role = $user_role_arr[0];
        if($c_user_role == 'personal') { ?>
            <a href="<?php echo get_site_url(); ?>/profile" class="singleprofile myprofile active" onclick="myProfile()">Min  <br>  Profil</a>
            <?php
        }
        else {

        ?>
        <a href="<?php echo get_site_url(); ?>/profile" class="myprofile active" onclick="myProfile()">Min <br> Profil</a>
        <a href="<?php echo get_site_url(); ?>/company-profile" class="companyProfile active" onclick="companyProfile()">Selskaps<br>  Profil</a>
        <?php
    }  
   
  }



  function getStartAndEndDate($week, $year) {
    $dateTime = new DateTime();
    $dateTime->setISODate($year, $week);
    $result['start_date'] = $dateTime->format('Y-m-d');
    $dateTime->modify('+4 days');
    $result['end_date'] = $dateTime->format('Y-m-d');
    return $result;
    }


    function reddirectProfile() {

        global $current_user;
        $logged_user = wp_get_current_user();
        $UIL =  $logged_user->user_login;
        $uid =  $logged_user->ID;
        $url = home_url('profile');
        if ( is_user_logged_in() ) {
        
          
            wp_redirect($url);
            exit();
        
        } else {
        
        //echo "Not Login" ;
        
        
        }


    }  
    function weekdaySort($a, $b){
        $weekdays = array("Monday","Tuesday","Wednesday","Thursday","Friday");
        return array_search($a, $weekdays) - array_search($b, $weekdays);
    } 


    
    function show_Allergens(){
        ?>

        <h6 class="mt-2">Allergener:</h6>
                                                <p class="allergens">
                                                    <?php 
                                                    echo strip_tags (
                                                        get_the_term_list( get_the_ID(), 'menu_sub_types',"",", " )
                                                    );
                                                    
                                                    ?> 
                                                    </p>

                                                    <?php
      
    } 




    
    function get_weeks($date) {
            $textdt=$date;
            $dt= strtotime( $textdt);
            $currdt=$dt;
            $nextmonth=strtotime($textdt."+1 month");            
            $month_weeks_arr = array();
            $i=0;
            do 
            {
                $weekday= date("w",$currdt);
                $nextday=7-$weekday;
                $endday=abs($weekday-7);
                $startarr[$i]=$currdt;
                $endarr[$i]=strtotime(date("Y-m-d",$currdt)."+$endday day");
                $currdt=strtotime(date("Y-m-d",$endarr[$i])."+1 day");
                $start_date =  date("Y-m-d",$startarr[$i]);
                //echo "Week ".($i+1) ." WeekID ".  date("W" ,strtotime($start_date))."-> start date = ". date("Y-m-d",$startarr[$i])." end date = ". date("Y-m-d",$endarr[$i])."<br>";
                $month_weeks_arr[] = date("W-m-y" ,strtotime($start_date));
                $i++;
                                
            }while($endarr[$i-1]<$nextmonth);
            
            return $month_weeks_arr;
            
        
        
        
        }

        function get_dates_of_month($month, $year) {
            $order_days=array();
            $month = $month;
            $year = $year;
            for($d=1; $d<=31; $d++)
            {
                $time=mktime(12, 0, 0, $month, $d, $year);          
                if (date('m', $time)==$month)       
                    $order_days[]=date('Y-m-d', $time);
            }

            return $order_days;
}

function weekOfMonth($date) {
    list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($date)));  
    $w = 1;
    for ($i = 1; $i < $d; ++$i) {
        // if that day was a sunday and is not the first day of month
        if ($i > 1 && date('w', strtotime("$y-$m-$i")) == 0) {
            // increment current week
            ++$w;
        }
    }
    
    // now return
    return $w;
}


function createDateRangeArray($strDateFrom,$strDateTo)
{
    $aryRange = [];
    $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
    $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));
    if ($iDateTo >= $iDateFrom) {
        array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
        while ($iDateFrom<$iDateTo) {
            $iDateFrom += 86400; // add 24 hours
            array_push($aryRange, date('Y-m-d', $iDateFrom));
        }
    }
    return $aryRange;
}


function get_dates_of_week($week,$year) {
        $dateTime = new DateTime();
        $dateTime->setISODate($year,$week);
        $w_start_date = $dateTime->format('Y-m-d');
        $dateTime->modify('+4 days');
        $w_end_date = $dateTime->format('Y-m-d');
        $result = createDateRangeArray($w_start_date, $w_end_date);
        return $result;
    }
  

function cancel_Oder($oid, $date) {
    $today_date =  date('Y-m-d');
    $current_time =  date('H:i');

    $system_order_date =  strtotime(date('Y-m-d'));
    // echo $today_date;
    $today_day_name = date('l', $system_order_date);



//     echo $today_date;
//     echo "<br/>";
//    echo  $current_time;
    if($today_date == $date && $current_time < strtotime(date('11:00')))
    {
        ?><button data-oid="<?php echo $oid?>" class="btn_primary btn_cancel " >Avbryt bestillingen</button> <?php
    }
    else{

        if($today_day_name == 'Friday'  && $current_time > strtotime(date('11:00')) ) {

            ?><button data-oid="<?php echo $oid?>" class="btn_primary btn_cancel" >Avbryt bestillingen</button> <?php
        }
        else 
        {

            ?><button data-oid="<?php echo $oid?>" class="btn_primary btn_cancel " >Avbryt bestillingen</button> <?php

        }      
    }
    
}