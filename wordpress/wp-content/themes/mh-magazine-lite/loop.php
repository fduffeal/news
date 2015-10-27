<?php /* Loop Template used for index/archive/search */ ?>
<article <?php post_class(); ?>>
	<div class="loop-wrap clearfix">
		<div class="loop-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php if (has_post_thumbnail()) { the_post_thumbnail('loop'); } else { echo '<img src="' . get_template_directory_uri() . '/images/noimage_174x131.png' . '" alt="No Picture" />'; } ?>
			</a>
		</div>
		<header class="loop-data">
			<h3 class="loop-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<p class="meta"><a href="<?php the_permalink()?>" rel="bookmark"><?php $date = get_the_date(); echo $date; ?></a> // <?php comments_number(__('0 Comments', 'mh-magazine-lite'), __('1 Comment', 'mh-magazine-lite'), __('% Comments', 'mh-magazine-lite')); ?></p>
		</header>
		<?php the_excerpt(); ?>
	</div>
</article>