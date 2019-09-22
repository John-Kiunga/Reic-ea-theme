<?php
/**
 * Template Name: Page, with sidebar on the left
 * Description: A regular content page with sidebar on the left
 */
?>
<?php
@$active_profile = get_post_meta($post->ID, 'justlanded_meta_box_selectinstance_select', true);
do_action('justlanded_before_page_options'); // custom hook
if (defined('SITE_DEFAULT_PROFILE_OVERRIDE')) {
	$data = get_option(OPTIONSPREFIX.SITE_DEFAULT_PROFILE_OVERRIDE);
	if (!defined('JUSTLANDED_THIS_PROFILE')) define('JUSTLANDED_THIS_PROFILE', SITE_DEFAULT_PROFILE_OVERRIDE);
} else {
	if ($active_profile != 0) {
		$data = get_option( OPTIONSPREFIX . $active_profile );
		if (!defined('JUSTLANDED_THIS_PROFILE')) define('JUSTLANDED_THIS_PROFILE', $active_profile);
	} else {
		$data = get_option(OPTIONSPREFIX.SITE_DEFAULT_PROFILE);
		if (!defined('JUSTLANDED_THIS_PROFILE')) define('JUSTLANDED_THIS_PROFILE', SITE_DEFAULT_PROFILE);
	}
}
do_action('justlanded_after_page_options'); // custom hook
?>
<?php get_header(); ?>
	<article id="content"<?php if (justlanded_get_option('show_page_banner', 0, $data) == true) { echo ' class="row"'; } ?>>
		<?php if (justlanded_get_option('hide_page_titles', 0, $data) == 0) : ?>
			<h1 class="page-title"><?php the_title(); ?></h1>
		<?php endif; ?>
		<?php get_sidebar(); ?>
		<div class="block_680">
			<?php the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
					?>
					<?php the_content(); ?>
					<?php if (isset($data['disable_comments']) && $data['disable_comments'] == 1) {
						// do nothing, user does not want comments to be displayed
					} else comments_template('', true); ?>
					<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'justlanded' ) . '&after=</div>') ?>
					<?php edit_post_link( __( 'Edit', 'justlanded' ), '<div class="edit-link">', '</div>' ) ?>
				</div>
			</div>
		</div>
	</article>
<?php get_footer(); ?>