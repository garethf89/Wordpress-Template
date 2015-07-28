<?php get_header(); ?>

<div id="content" class="fixed-nav row">

    <!-- Header -->
     <?php include_once('/partials/top-header.php'); ?>

    <main id="main" class="columns large-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf'); ?> role="article">

            <header class="article-header">

                <h1 class="single-title portfolio--title"><?php the_title(); ?></h1>
                <p class="byline vcard">
                    <?php printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time(get_option( 'date_format')), get_the_author_link( get_the_author_meta( 'ID' ) ), get_the_term_list( $post->ID, 'custom_cat', ' ', ', ', '' ) ); ?>
                </p>

            </header>

            <section class="entry-content cf">
                <?php // the content (pretty self explanatory huh) the_content(); ?>
            </section>
            <!-- end article section -->


        </article>

        <?php endwhile; ?>

        <?php else : ?>

        <article id="post-not-found" class="large-12 columns">
            <header class="article-header">
                <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
            </header>
            <section class="entry-content">
                <p>
                    <?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?>
                </p>
            </section>
            <footer class="article-footer">
                <p>
                    <?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?>
                </p>
            </footer>
        </article>

        <?php endif; ?>

    </main>

    <?php //get_sidebar(); ?>

</div>
<?php get_footer(); ?>