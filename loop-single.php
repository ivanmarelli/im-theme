            <div id="blog"class="left-col">

                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <!-- article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
                            </a>
                        <?php endif; ?>    <!-- /post thumbnail -->

                        <h2>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </h2> <!-- /post title -->

                        <!-- post details -->
                        <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                        <span class="author"><?php _e( 'Published by', 'dir' ); ?> <?php the_author_posts_link(); ?></span>
                        <span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'dir' ), __( '1 Comment', 'dir' ), __( '% Comments', 'dir' )); ?></span>
                        <!-- /post details -->

                        <?php the_content('Read more...'); // Build your custom callback length in functions.php ?>
                        <?php edit_post_link(); ?>
                    </article>
                    <!-- /article -->
                <?php endwhile; ?>
                <?php else: ?>
                    <!-- article -->
                    <article>
                        <h2><?php _e( 'Sorry, nothing to display.'); ?></h2>
                    </article>
                    <!-- /article -->
                <?php endif; ?>



            </div>  <!-- /fin blog left-col  -->

