<?php
/**
 * Template Name: Page (Default)
 * Description: Page template with Sidebar on the left side.
 *
 */

get_header();

the_post();
?>
<div class="row">
	<div class="col-12 col-lg-9 col-xl-10 mt-4">
		<div id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'forge' ),
						'after'  => '</div>',
					)
				);
				edit_post_link( esc_html__( 'Edit', 'forge' ), '<span class="edit-link">', '</span>' );
			?>
			<div class="row mt-2">
				<div class="col-12">
					<?php get_template_part('templates/social/social-share'); ?>
				</div>
			</div>
		</div><!-- /#post-<?php the_ID(); ?> -->
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
	</div><!-- /.col -->
	<?php
		get_sidebar();
	?>
</div><!-- /.row -->
<?php
get_footer();
