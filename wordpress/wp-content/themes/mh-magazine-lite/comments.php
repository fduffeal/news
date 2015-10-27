<?php /* Comments Template */
if (post_password_required()) {
	return;
}
$comments_by_type = separate_comments($comments);
if (have_comments()) {
	if (!empty($comments_by_type['comment'])) {
		$comment_count = count($comments_by_type['comment']);
		($comment_count !== 1) ? $comment_text = __('Comments', 'mh-magazine-lite') : $comment_text = __('Comment', 'mh-magazine-lite'); ?>
		<h4 class="section-title"><?php echo $comment_count . ' ' . $comment_text . __(' on ', 'mh-magazine-lite') . get_the_title(); ?></h4>
		<ol class="commentlist">
			<?php echo wp_list_comments('callback=mh_comments&type=comment'); ?>
		</ol><?php
	}
	if (get_comments_number() > get_option('comments_per_page')) { ?>
		<div class="comments-pagination">
			<?php paginate_comments_links(array('prev_text' => __('&laquo;', 'mh-magazine-lite'), 'next_text' => __('&raquo;', 'mh-magazine-lite'))); ?>
		</div><?php
	}
	if (!empty($comments_by_type['pings'])) {
		$pings = $comments_by_type['pings'];
		$ping_count = count($comments_by_type['pings']); ?>
		<h4 class="section-title"><?php echo $ping_count . ' ' . __('Trackbacks & Pingbacks', 'mh-magazine-lite'); ?></h4>
		<ol class="pinglist">
        <?php foreach ($pings as $ping) { ?>
			<li class="pings"><?php echo get_comment_author_link($ping); ?></li>
        <?php } ?>
        </ol><?php
	}
	if (!comments_open()) { ?>
		<p class="no-comments"><?php _e('Comments are closed.', 'mh-magazine-lite'); ?></p><?php
	}
}
if (comments_open()) {
	$custom_args = array(
    	'title_reply' => __('Leave a comment', 'mh-magazine-lite'),
        'comment_notes_before' => '<p class="comment-notes">' . __('Your email address will not be published.', 'mh-magazine-lite') . '</p>',
        'comment_notes_after'  => '',
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __('Comment', 'mh-magazine-lite') . '</label><br/><textarea id="comment" name="comment" cols="45" rows="5" aria-required="true"></textarea></p>');
	comment_form($custom_args);
}
?>