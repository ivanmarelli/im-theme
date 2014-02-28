<?php get_header (); ?>


            <?php get_sidebar (); ?>
            <?php get_template_part ('loop', 'index'); ?>

            <div class="navi">
                <div class="right">
                    <?php get_template_part('pagination'); ?>
                </div>
            </div> <!-- /fin  navi -->


          </div> <!-- /fin container  -->


    </div> <!-- /fin wrapper  -->


<?php get_footer (); ?>

