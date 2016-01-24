<?php
/**
 * Page template
 *
 * @since 0.1.0
 * @package wasentha
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

get_header();

the_post();
?>

<section id="page-<?php the_ID(); ?>" <?php body_class( array( 'page-content' ) ); ?>>
    <div class="row">
        <div class="small-12 medium-9 columns">

            <?php if ( has_post_thumbnail() ) : ?>
            <div class="page-image">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
            <?php endif; ?>
            
            <h1 class="page-title"><?php the_title(); ?></h1>

            <div class="page-copy">
                <?php the_content(); ?>
            </div>
            
            <div class="page-comments">
                <?php comments_template(); ?>
            </div>
            
        </div>

        <div class="small-12 medium-3 columns">

            <?php dynamic_sidebar( 'main-sidebar' ); ?>

        </div>

    </div>
</section>

<?php
get_footer();