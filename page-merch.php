<?php
/**
 * Template Name: Merchandise
 * Description: Page for displaying club merchandise offerings
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
				edit_post_link( esc_html__( 'Edit', 'forge' ), '<span class="edit-link">', '</span>' );
				the_content();
			?>

			<?php get_template_part('templates/merch'); ?>

			<div class="row">
				<div class="col-12">
					<?php get_template_part('templates/social/social-share'); ?>
				</div>
			</div>

			<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'forge' ),
						'after'  => '</div>',
					)
				);
			?>

		</div><!-- /#post-<?php the_ID(); ?> -->
	</div><!-- /.col -->
	<?php
		get_sidebar();
	?>
</div><!-- /.row -->
<?php
get_footer();
