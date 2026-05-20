<?php
/**
 * The default page template
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">
	<div class="container section">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header text-center" style="margin-bottom: 4rem;">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>

				<div class="entry-content" style="max-width: 800px; margin-inline: auto;">
					<?php the_content(); ?>
				</div>
			</article>
			<?php
		endwhile;
		?>
	</div>
</main>

<?php
get_footer();
