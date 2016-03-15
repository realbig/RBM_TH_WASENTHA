<?php
/**
 * Post index page.
 *
 * @since 0.1.0
 * @package wasentha
 *
 * @global WP_Query $wp_query
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

get_header();
?>

<section id="post-index" class="page-content">
    <div class="row">

        <?php
        if ( have_posts() ) : ?>
        
            <div class="small-12 columns">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article <?php post_class(); ?>>

                        <?php get_template_part( 'partials/' . get_post_type(), 'loop-single' ); ?>

                    </article>
                    <?php
                endwhile;
                ?>
            </div>
        <?php
        else:
        ?>

        <div class="small-12 medium-9 columns">
            Nothing found.
        </div>

        <?php endif; ?>
        
        <div class="pagination">
            <?php 
            $post_type_object = get_post_type_object( get_post_type() );
            $plural_label = $post_type_object->labels->name;
            echo paginate_links( array(
                'current' => ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ),
                'prev_text' => sprintf( __( '&laquo; View Older %s', THEME_ID ), $plural_label ),
                'next_text' => sprintf( __( 'View Newer %s &raquo;', THEME_ID ), $plural_label ),
            ) );
            ?>
        </div>
        
    </div>
</section>

<?php
get_footer();