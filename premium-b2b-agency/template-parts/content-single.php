<?php
/**
 * Template part for displaying single posts
 *
 * @package Premium_B2B
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/BlogPosting">
    <meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
    <header class="entry-header section" style="padding-top: 0;">
        <div class="container" style="max-width: 900px; padding: 0;">
            <div class="entry-meta" style="margin-bottom: var(--sp-4);">
                <?php the_category( ' ' ); ?>
            </div>
            <?php the_title( '<h1 class="entry-title" itemprop="headline" style="font-size: var(--fs-xl); line-height: 1; margin-bottom: var(--sp-6);">', '</h1>' ); ?>
            <div class="post-metadata flex" style="gap: var(--sp-4); font-size: var(--fs-xs); font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; opacity: 0.7;">
                <span itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php echo esc_html__( 'BY ', 'premium-b2b' ) . get_the_author(); ?></span></span>
                <span style="color: var(--color-accent);">/</span>
                <time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
                <span style="color: var(--color-accent);">/</span>
                <span><?php echo premium_b2b_reading_time(); ?></span>
            </div>
        </div>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="single-post-thumbnail" style="margin-bottom: var(--sp-12); border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-xl);">
            <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%; height:auto;' ) ); ?>
        </div>
    <?php endif; ?>

    <div class="entry-content" itemprop="articleBody">
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
    <nav class="post-navigation section" style="border-top: 1px solid var(--color-border); margin-top: var(--sp-12); padding-top: var(--sp-12);">
        <div class="flex" style="justify-content: space-between; gap: var(--sp-8);">
            <div class="nav-prev"><?php previous_post_link( '%link', '&larr; <span style="font-size: var(--fs-xs); font-weight: 900; text-transform: uppercase;">PREVIOUS</span><br>%title' ); ?></div>
            <div class="nav-next" style="text-align: right;"><?php next_post_link( '%link', '<span style="font-size: var(--fs-xs); font-weight: 900; text-transform: uppercase;">NEXT</span> &rarr;<br>%title' ); ?></div>
        </div>
    </nav>

    <!-- Social Sharing -->
    <?php if ( get_theme_mod( 'enable_social_sharing', true ) ) : ?>
        <div class="social-sharing section" style="padding-top: var(--sp-8); border-top: 1px solid var(--color-border); margin-top: var(--sp-8);">
            <p style="font-weight: 900; font-size: var(--fs-xs); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: var(--sp-4);"><?php esc_html_e( 'Distribute This Strategy:', 'premium-b2b' ); ?></p>
            <div class="flex" style="gap: var(--sp-4);">
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer" class="btn" style="padding: 0.75rem 1.5rem; border: 1px solid var(--color-border); font-size: 10px;">LINKEDIN</a>
                <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer" class="btn" style="padding: 0.75rem 1.5rem; border: 1px solid var(--color-border); font-size: 10px;">TWITTER</a>
                <a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" class="btn" style="padding: 0.75rem 1.5rem; border: 1px solid var(--color-border); font-size: 10px;">EMAIL</a>
            </div>
        </div>
    <?php endif; ?>

    <!-- Author Bio -->
    <footer class="entry-footer" style="margin-top: var(--sp-12); background: var(--color-white); border: 1px solid var(--color-border); padding: var(--sp-8); border-radius: var(--radius-sm);">
        <div class="author-bio flex" style="align-items: flex-start; gap: var(--sp-6);">
            <div class="author-avatar" style="width: 80px; height: 80px; background: var(--color-primary); border-radius: 1rem; flex-shrink: 0; display: flex; align-items: center; justify-content: center; color: white; font-weight: 900; font-size: var(--fs-lg);">
                <?php echo substr(get_the_author(), 0, 1); ?>
            </div>
            <div class="author-info">
                <h4 style="margin-bottom: var(--sp-2); font-size: var(--fs-base); letter-spacing: -0.02em;"><?php the_author(); ?></h4>
                <p class="text-light" style="font-size: var(--fs-xs); line-height: 1.6; margin-bottom: 0;"><?php the_author_meta( 'description' ); ?></p>
            </div>
        </div>
    </footer>

</article>
