<?php get_header(); ?>
<div class="mh-wrapper clearfix">
	<div id="main-content" class="mh-content"><?php
		mh_before_page_content();
		mh_author_box();
		mh_loop_content(); ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>