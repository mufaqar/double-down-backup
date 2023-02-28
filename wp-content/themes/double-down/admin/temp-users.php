<?php /* Template Name: Admin-Users  */



get_header('admin');


?>
<?php include('navigation.php'); ?>
<div class="admin_parrent">
    <div class="toggle_btn">
        <div class="row ">
            <div class="catering_wrapper mt-5 mb-2 col-md-8 p-0">
                <div class="catering_menu buttons">
                    <a id="1" class="showSingle _active" target="1" data="">Alle brukere</a>
                    <a id="2" class="showSingle" target="2" data="personal">Ansatter</a>
                    <a id="2" class="showSingle" target="2" data="Company">Bedrifte</a>
                </div>
            </div>
        </div>
    </div>
    <section id="div1" class="targetDiv activediv tablediv">
        <table id="allusers" class="table table-striped orders_table" style="width:100%">
            <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Navn</th>
                    <th>Brukertype</th>
                    <th>Telefon</th>
                    <th>E-post</th>
                   
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;

                $members = get_users(
                    array(                      
                        'orderby' => 'ID',
                        'order'   => 'ASC'
                    )
                );
                $users = get_users($members);               

                foreach ($users as $user) {
                     $user_roles = $user->roles;

                     $comapnay_name = get_user_meta($user->ID, 'compnay_name', true);
                   
                    $i++;  ?>
                    <tr>
                        <td class="pt-4"><?php echo $i ?></td>
                        <td class="d-flex align-items-center"><img class="_user_profile" src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" alt="profile" />
                        <?php echo $user->display_name ;   ?></td>
                        <td><?php echo ucfirst($user_roles[0]); if($comapnay_name != '') { echo " [". $comapnay_name ." ]" ;} ?></td>
                        <td><?php echo get_user_meta($user->ID, 'profile_delivery_phone', true);
                        
                        
                        
                        
                        
                        ?></td>
                        <td><?php echo $user->user_email ?></td>
                      

                    </tr>
                <?php } ?>

            </tbody>

        </table>

    </section>
    
</div>





<?php get_footer('admin') ?>