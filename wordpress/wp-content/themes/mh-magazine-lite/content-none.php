<?php /** The template for displaying a "No posts found" message. */ ?>
<div class="entry sb-widget">
<?php if (is_search()) { ?>
	<div class="box alert">
		<p><?php echo __('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'mh-magazine-lite'); ?></p>
	</div>
<?php } else { ?>
	<div class="box alert">
		<p><?php echo __('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mh-magazine-lite'); ?></p>
	</div>
<?php } ?>
<h4 class="widget-title"><?php _e('Search', 'mh-magazine-lite'); ?></h4>
<?php get_search_form(); ?>
</div>
<div class="404-recent-articles home-wide"><?php
	$instance = array('title' => __('Recent Articles', 'mh-magazine-lite'), 'postcount' => '6', 'sticky' => 1);
	$args = array('before_widget' => '<div class="sb-widget">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>');
	the_widget('mh_custom_posts_widget', $instance , $args); ?>
</div>