<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!','ddd_translate'));
	if ( post_password_required() ) { ?>
		<?php _e('This post is password protected. Enter the password to view comments.','ddd_translate'); ?>
	<?php
		return;
	}
?>
<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number(__('No Responses','ddd_translate'), __('One Response','ddd_translate'), __('% Responses','ddd_translate') );?></h3>
	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>
	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<p><?php _e('Comments are closed.','ddd_translate'); ?></p>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<div id="respond">
	<h3><?php comment_form_title(__('Leave a Reply','ddd_translate'), __('Leave a Reply to %s','ddd_translate') ); ?></h3>
	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><?php _e('You must be','ddd_translate'); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('logged in','ddd_translate'); ?></a> <?php _e('to post a comment.','ddd_translate'); ?></p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( is_user_logged_in() ) : ?>
			<p><?php _e('Logged in as','ddd_translate'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account','ddd_translate'); ?>"><?php _e('Log out','ddd_translate'); ?> &raquo;</a></p>
		<?php else : ?>
			<ul>
                <li>
                    <input type="text" name="author" class="author-comments input-comment" id="author" value="<?php _e('Name','ddd_translate'); ?><?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" />
                </li>	
                <li class="middle">             
                    <input type="text" name="email" class="email-comments input-comment" id="email" value="<?php _e('Email','ddd_translate'); ?><?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" />
                </li>
                <li>
                    <input type="text" class="url-comments input-comment" name="url" id="url" value="<?php _e('Website','ddd_translate'); ?><?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" />
                </li>
            </ul>
		<?php endif; ?>
		<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->
		<div>
			<textarea class="text-comments text-comment" name="comment" id="comment" cols="58" rows="10" tabindex="4" ></textarea>
		</div>
		<div>
			<input name="submit" class="submit-comments submit-comment" type="submit" id="submit" tabindex="5" value="<?php _e('Submit comment','ddd_translate'); ?>" />
			<?php comment_id_fields(); ?>
		</div>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
	<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; ?>