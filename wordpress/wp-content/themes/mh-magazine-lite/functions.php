<?php

/***** Fetch Options *****/

$mh_magazine_lite_options = get_option('mh_options');

/***** Custom Hooks *****/

function mh_html_class() {
    do_action('mh_html_class');
}
function mh_before_page_content() {
    do_action('mh_before_page_content');
}
function mh_before_post_content() {
    do_action('mh_before_post_content');
}
function mh_after_post_content() {
    do_action('mh_after_post_content');
}
function mh_post_header() {
    do_action('mh_post_header');
}
function mh_loop_content() {
    do_action('mh_loop_content');
}

/***** Enable Shortcodes inside Widgets	*****/

add_filter('widget_text', 'do_shortcode');

/***** Theme Setup *****/

function mh_magazine_lite_setup() {
	global $content_width;
	if (!isset($content_width)) {
		$content_width = 620;
	}
	$header = array(
		'default-image' => '',
		'width' => 300,
		'height' => 100,
		'flex-width' => true,
		'flex-height' => true,
		'header-text' => false
	);
	add_theme_support('custom-header', $header);
	load_theme_textdomain('mh-magazine-lite', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('custom-background');
	add_theme_support('post-thumbnails');
	add_image_size('content', 620, 264, true);
	add_image_size('loop', 174, 131, true);
	add_image_size('cp_small', 70, 53, true);
	add_editor_style();
	register_nav_menu('main_nav', __('Main Navigation', 'mh-magazine-lite'));
}
add_action('after_setup_theme', 'mh_magazine_lite_setup');

/***** Load CSS & JavaScript *****/

if (!function_exists('mh_scripts')) {
	function mh_scripts() {
		wp_enqueue_style('mh-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,600', array(), null);
		wp_enqueue_style('mh-style', get_stylesheet_uri(), false, '1.9.4');
		wp_enqueue_script('mh-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
		if (!is_admin()) {
			if (is_singular() && comments_open() && (get_option('thread_comments') == 1))
				wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'mh_scripts');

if (!function_exists('mh_magazine_lite_admin_scripts')) {
	function mh_magazine_lite_admin_scripts($hook) {
		if ('appearance_page_magazine' === $hook || 'widgets.php' === $hook) {
			wp_enqueue_style('mh-admin', get_template_directory_uri() . '/admin/admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'mh_magazine_lite_admin_scripts');

/***** Register Widget Areas / Sidebars	*****/

if (!function_exists('mh_widgets_init')) {
	function mh_widgets_init() {
		register_sidebar(array('name' => __('Sidebar', 'mh-magazine-lite'), 'id' => 'sidebar', 'description' => __('Widget area (sidebar left/right) on single posts, pages and archives', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => __('Home 1', 'mh-magazine-lite'), 'id' => 'home-1', 'description' => __('Widget area on homepage', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget home-1 home-wide %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => __('Home 2', 'mh-magazine-lite'), 'id' => 'home-2', 'description' => __('Widget area on homepage', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget home-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => __('Home 3', 'mh-magazine-lite'), 'id' => 'home-3', 'description' => __('Widget area on homepage', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget home-3 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => __('Home 4', 'mh-magazine-lite'), 'id' => 'home-4', 'description' => __('Widget area on homepage', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget home-4 home-wide %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => __('Home 5', 'mh-magazine-lite'), 'id' => 'home-5', 'description' => __('Widget area on homepage', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget home-5 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => __('Posts 1', 'mh-magazine-lite'), 'id' => 'posts-1', 'description' => __('Widget area above single post content', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget posts-1 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => __('Posts 2', 'mh-magazine-lite'), 'id' => 'posts-2', 'description' => __('Widget area below single post content', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget posts-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => __('Footer 1', 'mh-magazine-lite'), 'id' => 'footer-1', 'description' => __('Widget area in footer', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="footer-widget footer-1 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="footer-widget-title">', 'after_title' => '</h6>'));
		register_sidebar(array('name' => __('Footer 2', 'mh-magazine-lite'), 'id' => 'footer-2', 'description' => __('Widget area in footer', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="footer-widget footer-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="footer-widget-title">', 'after_title' => '</h6>'));
		register_sidebar(array('name' => __('Footer 3', 'mh-magazine-lite'), 'id' => 'footer-3', 'description' => __('Widget area in footer', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="footer-widget footer-3 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="footer-widget-title">', 'after_title' => '</h6>'));
		register_sidebar(array('name' => __('Footer 4', 'mh-magazine-lite'), 'id' => 'footer-4', 'description' => __('Widget area in footer', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="footer-widget footer-4 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="footer-widget-title">', 'after_title' => '</h6>'));
	}
}
add_action('widgets_init', 'mh_widgets_init');

/***** Add CSS classes to HTML tag *****/

if (!function_exists('mh_magazine_lite_html_class')) {
	function mh_magazine_lite_html_class() {
		$mh_magazine_lite_options = mh_magazine_lite_theme_options();
		isset($mh_magazine_lite_options['full_bg']) && $mh_magazine_lite_options['full_bg'] == 1 ? $fullbg = ' fullbg' : $fullbg = '';
		echo $fullbg;
	}
}
add_action('mh_html_class', 'mh_magazine_lite_html_class');

/***** Add CSS classes to body tag *****/

if (!function_exists('mh_magazine_lite_body_class')) {
	function mh_magazine_lite_body_class($classes) {
		$mh_magazine_lite_options = mh_magazine_lite_theme_options();
		$classes[] = 'mh-' . $mh_magazine_lite_options['sb_position'] . '-sb';
		return $classes;
	}
}
add_filter('body_class', 'mh_magazine_lite_body_class');

/***** Logo / Header Image Fallback *****/

if (!function_exists('mh_logo')) {
	function mh_logo() {
		$header_img = get_header_image();
		echo '<div class="logo-wrap" role="banner">' . "\n";
		if ($header_img) {
			echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" rel="home"><img src="' . esc_url($header_img) . '" height="' . esc_attr(get_custom_header()->height) . '" width="' . esc_attr(get_custom_header()->width) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></a>' . "\n";
		} else {
			echo '<div class="logo">' . "\n";
			echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" rel="home">' . "\n";
			echo '<h1 class="logo-name">' . esc_attr(get_bloginfo('name')) . '</h1>' . "\n";
			echo '<h2 class="logo-desc">' . esc_attr(get_bloginfo('description')) . '</h2>' . "\n";
			echo '</a>' . "\n";
			echo '</div>' . "\n";
		}
		echo '</div>' . "\n";
	}
}

/***** Page Title Output *****/

if (!function_exists('mh_page_title')) {
	function mh_page_title() {
		if (!is_front_page()) {
			echo '<div class="page-title-top"></div>' . "\n";
			echo '<h1 class="page-title">';
			if (is_archive()) {
				if (is_category() || is_tax()) {
					single_cat_title();
				} elseif (is_tag()) {
					single_tag_title();
				} elseif (is_author()) {
					global $author;
					$user_info = get_userdata($author);
					printf(_x('Articles by %s', 'post author', 'mh-magazine-lite'), esc_attr($user_info->display_name));
				} elseif (is_day()) {
					echo get_the_date();
				} elseif (is_month()) {
					echo get_the_date('F Y');
				} elseif (is_year()) {
					echo get_the_date('Y');
				} else {
					_e('Archives', 'mh-magazine-lite');
				}
			} else {
				if (is_home()) {
					echo get_the_title(get_option('page_for_posts', true));
				} elseif (is_404()) {
					_e('Page not found (404)', 'mh-magazine-lite');
				} elseif (is_search()) {
					printf(__('Search Results for %s', 'mh-magazine-lite'), esc_attr(get_search_query()));
				} else {
					the_title();
				}
			}
			echo '</h1>' . "\n";
		}
	}
}
add_action('mh_before_page_content', 'mh_page_title');

/***** Subheading on Posts *****/

if (!function_exists('mh_subheading')) {
	function mh_subheading() {
		global $post;
		if (get_post_meta($post->ID, "mh-subheading", true)) {
			echo '<div class="subheading-top"></div>' . "\n";
			echo '<h2 class="subheading">' . esc_attr(get_post_meta($post->ID, "mh-subheading", true)) . '</h2>' . "\n";
		}
	}
}
add_action('mh_post_header', 'mh_subheading');

/***** Featured Image on Posts *****/

if (!function_exists('mh_featured_image')) {
	function mh_featured_image() {
		global $post;
		if (has_post_thumbnail() && !is_attachment()) {
			$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'content');
			echo "\n" . '<div class="post-thumbnail">' . "\n";
				echo '<img src="' . esc_url($thumbnail[0]) . '" alt="' . esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) . '" title="' . esc_attr(get_post(get_post_thumbnail_id())->post_title) . '" />' . "\n";
				if (get_post(get_post_thumbnail_id())->post_excerpt) {
					echo '<span class="wp-caption-text">' . wp_kses_post(get_post(get_post_thumbnail_id())->post_excerpt) . '</span>' . "\n";
				}
			echo '</div>' . "\n";
		}
	}
}

/***** Author box *****/

if (!function_exists('mh_author_box')) {
	function mh_author_box($author_ID = '') {
		$mh_magazine_lite_options = mh_magazine_lite_theme_options();
		if (isset($mh_magazine_lite_options['author_box'])) {
			if (!$mh_magazine_lite_options['author_box'] && !is_attachment() && get_the_author_meta('description', $author_ID)) {
				$author_ID = get_the_author_meta('ID');
				$ab_output = true;
			} else {
				$ab_output = false;
			}
		} elseif (!is_attachment() && get_the_author_meta('description', $author_ID)) {
			$author_ID = get_the_author_meta('ID');
			$ab_output = true;
		} else {
			$ab_output = false;
		}
		if ($ab_output) {
			echo '<section class="author-box">' . "\n";
				echo '<div class="author-box-wrap clearfix">' . "\n";
					echo '<div class="author-box-avatar">' . get_avatar($author_ID, 113) . '</div>' . "\n";
					echo '<h5 class="author-box-name">' . __('About ', 'mh-magazine-lite') . esc_attr(get_the_author_meta('display_name', $author_ID)) . '</h5>' . "\n";
					echo '<div class="author-box-desc">' . wp_kses_post(get_the_author_meta('description', $author_ID)) . '</div>' . "\n";
				echo '</div>' . "\n";
			echo '</section>' . "\n";
		}
	}
}
add_action('mh_after_post_content', 'mh_author_box');

/***** Post / Image Navigation *****/

if (!function_exists('mh_postnav')) {
	function mh_postnav() {
		global $post;
		$mh_magazine_lite_options = mh_magazine_lite_theme_options();
		if (isset($mh_magazine_lite_options['post_nav']) && $mh_magazine_lite_options['post_nav']) {
			$parent_post = get_post($post->post_parent);
			$attachment = is_attachment();
			$previous = ($attachment) ? $parent_post : get_adjacent_post(false, '', true);
			$next = get_adjacent_post(false, '', false);

			if (!$next && !$previous)
			return;

			if ($attachment) {
				$attachments = get_children(array('post_type' => 'attachment', 'post_mime_type' => 'image', 'post_parent' => $parent_post->ID));
				$count = count($attachments);
			}
			echo '<nav class="section-title clearfix" role="navigation">' . "\n";
				if ($previous || $attachment) {
					echo '<div class="post-nav left">' . "\n";
						if ($attachment) {
							if ($count == 1) {
								echo '<a href="' . esc_url(get_permalink($parent_post)) . '">' . __('&larr; Back to article', 'mh-magazine-lite') . '</a>';
							} else {
								previous_image_link('%link', __('&larr; Previous image', 'mh-magazine-lite'));
							}
						} else {
							previous_post_link('%link', __('&larr; Previous article', 'mh-magazine-lite'));
						}
					echo '</div>' . "\n";
				}
				if ($next || $attachment) {
					echo '<div class="post-nav right">' . "\n";
						if ($attachment) {
							next_image_link('%link', __('Next image &rarr;', 'mh-magazine-lite'));
						} else {
							next_post_link('%link', __('Next article &rarr;', 'mh-magazine-lite'));
						}
					echo '</div>' . "\n";
				}
			echo '</nav>' . "\n";
		}
	}
}
add_action('mh_after_post_content', 'mh_postnav');

/***** Loop Output *****/

if (!function_exists('mh_loop')) {
	function mh_loop() {
		if (have_posts()) {
			while (have_posts()) : the_post();
				get_template_part('loop', get_post_format());
			endwhile;
			mh_pagination();
		} else {
			get_template_part('content', 'none');
		}
	}
}
add_action('mh_loop_content', 'mh_loop');

/***** Custom Excerpts *****/

if (!function_exists('mh_magazine_lite_excerpt_length')) {
	function mh_magazine_lite_excerpt_length($length) {
		$mh_magazine_lite_options = mh_magazine_lite_theme_options();
		$excerpt_length = absint($mh_magazine_lite_options['excerpt_length']);
		return $excerpt_length;
	}
}
add_filter('excerpt_length', 'mh_magazine_lite_excerpt_length', 999);

if (!function_exists('mh_magazine_lite_excerpt_more')) {
	function mh_magazine_lite_excerpt_more($more) {
		global $post;
		$mh_magazine_lite_options = mh_magazine_lite_theme_options();
		return ' <a class="mh-excerpt-more" href="' . esc_url(get_permalink($post->ID)) . '" title="' . the_title_attribute('echo=0') . '">' . esc_attr($mh_magazine_lite_options['excerpt_more']) . '</a>';
	}
}
add_filter('excerpt_more', 'mh_magazine_lite_excerpt_more');

if (!function_exists('mh_magazine_lite_excerpt_markup')) {
	function mh_magazine_lite_excerpt_markup($excerpt) {
		$markup = '<div class="mh-excerpt">' . $excerpt . '</div>';
		return $markup;
	}
}
add_filter('the_excerpt', 'mh_magazine_lite_excerpt_markup');

/***** Custom Commentlist *****/

if (!function_exists('mh_comments')) {
	function mh_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="vcard meta">
					<?php echo get_avatar($comment->comment_author_email, 30); ?>
					<?php echo get_comment_author_link() ?> //
					<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)) ?>"><?php printf(__('%1$s at %2$s', 'mh-magazine-lite'), get_comment_date(),  get_comment_time()) ?></a> //
					<?php if (comments_open() && $args['max_depth']!=$depth) { ?>
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					<?php } ?>
					<?php edit_comment_link(__('(Edit)', 'mh-magazine-lite'),'  ','') ?>
				</div>
				<?php if ($comment->comment_approved == '0') : ?>
					<div class="comment-info"><?php _e('Your comment is awaiting moderation.', 'mh-magazine-lite') ?></div>
				<?php endif; ?>
				<div class="comment-text">
					<?php comment_text() ?>
				</div>
			</div><?php
	}
}

/***** Custom Comment Fields *****/

if (!function_exists('mh_comment_fields')) {
	function mh_comment_fields($fields) {
		$commenter = wp_get_current_commenter();
		$req = get_option('require_name_email');
		$aria_req = ($req ? " aria-required='true'" : '');
		$fields =  array(
			'author'	=>	'<p class="comment-form-author"><label for="author">' . __('Name ', 'mh-magazine-lite') . '</label>' . ($req ? '<span class="required">*</span>' : '') . '<br/><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
			'email' 	=>	'<p class="comment-form-email"><label for="email">' . __('Email ', 'mh-magazine-lite') . '</label>' . ($req ? '<span class="required">*</span>' : '' ) . '<br/><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>',
			'url' 		=>	'<p class="comment-form-url"><label for="url">' . __('Website', 'mh-magazine-lite') . '</label><br/><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>'
		);
		return $fields;
	}
}
add_filter('comment_form_default_fields', 'mh_comment_fields');

/***** Pagination *****/

if (!function_exists('mh_pagination')) {
	function mh_pagination() {
		global $wp_query;
	    $big = 9999;
		echo paginate_links(array('base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))), 'format' => '?paged=%#%', 'current' => max(1, get_query_var('paged')), 'prev_next' => true, 'prev_text' => __('&laquo;', 'mh-magazine-lite'), 'next_text' => __('&raquo;', 'mh-magazine-lite'), 'total' => $wp_query->max_num_pages));
	}
}

if (!function_exists('mh_posts_pagination')) {
	function mh_posts_pagination($content) {
		if (is_singular() && is_main_query()) {
			$content .= wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before' => '<span class="pagelink">', 'link_after' => '</span>', 'nextpagelink' => __('&raquo;', 'mh-magazine-lite'), 'previouspagelink' => __('&laquo;', 'mh-magazine-lite'), 'pagelink' => '%', 'echo' => 0));
		}
		return $content;
	}
}
add_filter('the_content', 'mh_posts_pagination', 1);

/***** Add Featured Image Size to Media Gallery Selection *****/

if (!function_exists('custom_image_size_choose')) {
	function custom_image_size_choose($sizes) {
		$custom_sizes = array('content' => 'Featured Image');
		return array_merge($sizes, $custom_sizes);
	}
}
add_filter('image_size_names_choose', 'custom_image_size_choose');

/***** Add CSS3 Media Queries Support for older versions of IE *****/

function mh_magazine_lite_media_queries() {
	echo '<!--[if lt IE 9]>' . "\n";
	echo '<script src="' . get_template_directory_uri() . '/js/css3-mediaqueries.js"></script>' . "\n";
	echo '<![endif]-->' . "\n";
}
add_action('wp_head', 'mh_magazine_lite_media_queries');

/***** Include Functions *****/

if (is_admin()) {
	require_once('admin/admin.php');
}

require_once('includes/mh-options.php');
require_once('includes/mh-widgets.php');

?>