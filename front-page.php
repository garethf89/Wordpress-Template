<?php get_header(); ?>

<div id="content" class="fixed-nav">

    <!-- Header -->
    <?php include_once('/partials/top-header.php'); ?>

    <main id="main" role="main" itemscope itemprop="mainContentOfPage">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>">

            <header class="article-header">
                <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
            </header>

            <section class="entry-content" itemprop="articleBody">
                <?php // the content (pretty self explanatory huh) 
                    the_content(); 
                ?>
            </section>
            <?php // end article section ?>

        </article>
        <?php endwhile; ?>
        <?php endif; ?>
    </main>

</div>

<?php get_footer(); ?>