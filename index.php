<?php
/**
 * The main template file
 */
get_header();
?>

<div class="container section-padding">
    <h1><?php single_post_title(); ?></h1>
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>
