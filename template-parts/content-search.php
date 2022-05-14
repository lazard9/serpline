<?php
/**
 * Template part for displaying results in search and pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package serpline
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-individual">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php if (has_post_thumbnail()) : $feat_image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
            <div class="post-individual-img">     
                <div class="post-individual-background" style="background-image:url('<?php echo $feat_image ?>');">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
                </div>
            </div>
            <div class="post-individual-txt">
                <p><?php echo wp_trim_words( get_the_content(), 50, ' ...' ); ?></p>
                <div><?php serpline_entry_posts(); ?></div>
            </div>
        <?php else: ?>
            <div class="post-individual-txt wdt">
                <p><?php echo wp_trim_words( get_the_content(), 50, ' ...' ); ?></p>
                <div><?php serpline_entry_posts(); ?></div>
            </div>
            <div class="post-vertical"></div>
        <?php endif;
        if ( is_page('Blog') ) { ?>
            <a href="<?php the_permalink(); ?>" class="continue-reading">Continue Reading</a>
        <?php } ?>
    </div>
</article>