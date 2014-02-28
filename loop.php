

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Hola, Bienvenidos!</h1>
            <p><?php bloginfo('description'); ?> </p>
          </div>
          <div class="row">

                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <!-- article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <div class="col-6 col-sm-6 col-lg-4">
                            <h2>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
                         </h2>
                        <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail(array(200,150)); // Declare pixel size you need inside the array ?>
                            </a>
                        <?php endif; ?>    <!-- /post thumbnail -->

                          <p> <?php im_wp_excerpt('im_wp_excerpt_index'); ?> </p>
                           <!-- post details -->
                            <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                            <span class="author"><?php _e( 'Published by', 'dir' ); ?> <?php the_author_posts_link(); ?></span>
                            <span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'dir' ), __( '1 Comment', 'dir' ), __( '% Comments', 'dir' )); ?></span>
                        <!-- /post details -->
                          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>




                        <?php edit_post_link(); ?>
                        </div><!--/span-->
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


          </div><!--/row-->
          <?php get_template_part('pagination'); ?>
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="#" class="list-group-item active">HTML5</a>
            <a href="#" class="list-group-item">CSS3</a>
            <a href="#" class="list-group-item">Bosotrap</a>
            <a href="#" class="list-group-item">GitHub</a>
            <a href="#" class="list-group-item">Sublime Text 2</a>
          </div>
        </div><!--/span-->
      </div><!--/row-->








