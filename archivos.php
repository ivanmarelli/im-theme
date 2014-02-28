<?php
/*
Template Name: Archivos
*/
?>
<?php get_header (); ?>
    <div id="container">
        <div id="content" role="main">
            <?php the_post(); ?>
            <h1 class="entry-title"> <?php the_title(); ?> </h1>

            <?php get_search_form(); ?>

            <h2>Archivo por mes</h2>
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>

            <h2>Archivo por categoría</h2>
            <ul>
                <?php wp_list_categories(); ?>
            </ul>

        </div> <!-- /fin content main  -->

    </div> <!-- /fin container  -->

<?php get_footer (); ?>

