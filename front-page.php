<?php
/**
 * Front Page template
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

<div id="intro-message" class="row collapse">
    <div class="media-object stack-for-small">

        <div class="media-object-section">
            <?php echo wp_get_attachment_image( get_theme_mod( 'home_page_intro_image', 9 ), 'medium', false, array( 'class' => 'thumbnail' ) ); ?>
        </div>

        <div class="media-object-section">
            <h1 class="title"><?php echo get_bloginfo( 'name' ); ?></h1>
            <?php echo apply_filters( 'the_content', get_theme_mod( 'home_page_intro_paragraph', 'Enter Text in the Customizer' ) ); ?>
        </div>

    </div>
</div>

<section id="page-<?php the_ID(); ?>" <?php body_class( array( 'page-content' ) ); ?>>

    <div class="row">

        <div class="small-12 columns">

            <div class="page-copy">
                <?php the_content(); ?>
            </div>

        </div>

    </div>
</section>

<section id="workshops-exhibits" class="row collapse">

    <div class="small-12 medium-6 columns valign-center text-center">
        
        <h2><?php echo get_theme_mod( 'home_page_workshop_title', 'Workshops' ); ?></h2>
        <?php dynamic_sidebar( 'seminar-sidebar' ); ?>
        
    </div>
    <div class="small-12 medium-6 columns valign-center text-center">
        
        <h2><?php echo get_theme_mod( 'home_page_exhibits_title', 'Current Exhibits' ); ?></h2>
        <?php dynamic_sidebar( 'presentation-sidebar' ); ?>
        
    </div>

</section>

<section id="recent-posts">
    <?php echo do_shortcode( get_theme_mod( 'home_page_recent_posts', '[wasentha_post excerpt=false date=true classes="home-blogs-list" title="Recent Blog Posts"]' ) ); ?>
</section>

<?php
get_footer();