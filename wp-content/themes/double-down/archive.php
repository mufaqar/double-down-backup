<?php get_header(); ?>	
<?php if (have_posts()) : ?>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
	<h2><?php _e('Archive for the','ddd_translate'); ?> &#8216; <?php single_cat_title(); ?> &#8217; <?php _e('Category','ddd_translate'); ?></h2>
<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h2><?php _e('Posts Tagged', 'ddd_translate'); ?> &#8216; <?php single_tag_title(); ?> &#8217;</h2>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h2><?php _e('Archive for','ddd_translate'); ?> <?php the_time('F jS, Y'); ?></h2>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h2><?php _e('Archive for','ddd_translate'); ?> <?php the_time('F, Y'); ?></h2>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h2><?php _e('Archive for','ddd_translate'); ?> <?php the_time('Y'); ?></h2>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h2><?php _e('Author Archive','ddd_translate'); ?> </h2>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h2><?php _e('Blog Archives','ddd_translate'); ?> </h2>
<?php } ?>
<?php while (have_posts()) : the_post(); ?>
	<div <?php post_class() ?>>
        <h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
        <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
        <div class="entry">			
			 <?php if ( has_post_thumbnail() ) { ?>
                    <div class="thumb">
						<?php the_post_thumbnail(); ?>
                    </div>
				<?php } ?>	
			<?php 
				global $more;    // Declare global $more (before the loop).
				$more = 0;       // Set (inside the loop) to display content above the more tag.
				the_content(__('Continue Reading','ddd_translate'));
			?>
            <div class="clear"></div>
			<div class="tags">
			<?php the_tags( __('Tags:','ddd_translate'),'','.'); ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>
<?php if (function_exists("pagination")) {
	pagination($additional_loop->max_num_pages);
} ?>			
<?php else : ?>
	<h2><?php _e('Ingenting funnet','ddd_translate'); ?></h2>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>