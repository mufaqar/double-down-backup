<?php /* Template Name: Admin-Catering  */ 
get_header('admin');
?>
<?php include('navigation.php'); ?>
<div class="admin_parrent">

<section id="div1" class="targetDiv activediv tablediv">
    <table id="all" class="table table-striped orders_table" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Ordre dato</th>
                <th>Antall pers.</th>
                <th>Addresse</th>
                <th>Mat type</th>
                <th>Pris</th>
                <th>Allergener</th>
                <th>Status </th>
            </tr>
        </thead>
        <tbody>

            <?php
            $i = 0;

            query_posts(array(
                'post_type' => 'catering',
                'posts_per_page' => -1,
                'order' => 'desc',


            ));

            if (have_posts()) :  while (have_posts()) : the_post();
                    $i++; ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php the_title() ?></td>
                        <td><?php the_field('people'); ?> </td>
                        <td><?php the_field('address'); ?> </td>
                        <td><?php echo get_the_terms($post->ID, 'food_type')[0]->name; ?></td>
                        <td>NOK <?php the_field('person'); ?></td>
                        <td><?php echo get_the_terms($post->ID, 'allergens')[0]->name; ?></td>
                        <td>Pending</td>
                    </tr>
                <?php endwhile;
                wp_reset_query();
            else : ?>
                <h2><?php _e('Ingenting funnet', 'ddd_translate'); ?></h2>
            <?php endif; ?>

        </tbody>

    </table>

</section>
</div>

<?php get_footer('admin') ?>