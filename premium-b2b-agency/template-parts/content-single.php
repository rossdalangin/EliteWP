<?php
/**
 * Template part for displaying single posts
 *
 * @package Premium_B2B
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/BlogPosting">
    <header class="entry-header section">
        <div class="container">
            <div class="entry-meta">
                <?php the_category( ', ' ); ?>
            </div>
            <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
            <div class="post-metadata">
                <span itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php echo esc_html__( 'By ', 'premium-b2b' ) . get_the_author(); ?></span></span> &bull;
                <time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time> &bull;
                <span><?php echo premium_b2b_reading_time(); ?></span>
            </div>
        </div>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="container single-post-thumbnail">
            <?php the_post_thumbnail( 'full' ); ?>
        </div>
    <?php endif; ?>

    <div class="entry-content container" itemprop="articleBody">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'premium-b2b' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div>

    <!-- Post Navigation -->
    <nav class="post-navigation container section" style="border-top: 1px solid var(--color-border); margin-top: 4rem;">
        <div class="flex" style="justify-content: space-between;">
            <div class="nav-prev"><?php previous_post_link( '%link', '&larr; Previous Insight' ); ?></div>
            <div class="nav-next"><?php next_post_link( '%link', 'Next Insight &rarr;' ); ?></div>
        </div>
    </nav>

    <!-- Social Sharing -->
    <?php if ( get_theme_mod( 'enable_social_sharing', true ) ) : ?>
        <div class="container social-sharing section" style="padding-top: 2rem;">
            <p style="font-weight: 700; margin-bottom: 1rem;"><?php esc_html_e( 'Share this Insight:', 'premium-b2b' ); ?></p>
            <div class="flex" style="gap: 2rem;">
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a>
                <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer">Twitter</a>
                <a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>">Email</a>
            </div>
        </div>
    <?php endif; ?>

    <!-- Author Bio -->
    <footer class="entry-footer container" style="margin-top: 4rem; border-top: 1px solid var(--color-border); padding-top: 4rem;">
        <div class="author-bio flex" style="align-items: center; gap: 2rem; background: var(--color-bg); padding: 2rem; border-radius: var(--radius);">
            <div class="author-avatar" style="width: 80px; height: 80px; background: #ddd; border-radius: 50%;"></div>
            <div class="author-info">
                <h4 style="margin-bottom: 0.5rem;"><?php the_author(); ?></h4>
                <p class="text-light" style="font-size: var(--fs-sm);"><?php the_author_meta( 'description' ); ?></p>
            </div>
        </div>

        <!-- CTA Card Widget -->
        <div class="cta-card" style="margin-top: 4rem;">
            <h3><?php echo esc_html( get_theme_mod( 'cta_card_title', __( 'Ready to Automate Your Pipeline?', 'premium-b2b' ) ) ); ?></h3>
            <p><?php echo esc_html( get_theme_mod( 'cta_card_desc', __( 'Book a discovery call today and see how we can help you scale.', 'premium-b2b' ) ) ); ?></p>
            <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary"><?php echo esc_html( get_theme_mod( 'hero_cta_text', __( 'Get a Free Strategy Session', 'premium-b2b' ) ) ); ?></a>
        </div>
    </footer>

</article>
