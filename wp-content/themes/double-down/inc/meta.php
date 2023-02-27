<div class="meta">
	<div class="float-left posted-on">
       <?php _e('Posted on','ddd_translate'); ?>: <?php the_time(get_option('date_format')); ?> <?php _e('by','ddd_translate'); ?> 
        <?php the_author_posts_link(); ?> in <?php the_category(', ') ?>
    </div>
    <div class="float-right comment-count">
        <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?>
    </div>
    <div class="clear"></div>
</div>