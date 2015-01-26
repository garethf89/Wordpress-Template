              <article id="post-<?php the_ID(); ?>" role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

                <header>

                  <h1 class="single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

                  <p class="vcard">

                    <?php printf( __( 'Posted %1$s %2$s', 'bonestheme' ),
                       /* the time the post was published */
                       '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                       /* the author of the post */
                       '<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    ); ?>

                  </p>

                </header> <?php // end article header ?>

                <section itemprop="articleBody">
                  <?php
                    the_content();
                  ?>
                </section> <?php // end article section ?>

                <footer>

                  <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

                </footer> <?php // end article footer ?>

                <?php comments_template(); ?>

              </article> <?php // end article ?>
