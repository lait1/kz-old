<?php get_header(); ?>
<?php get_header('page'); ?>
        <div class="page-content">
            <?php if (has_post_thumbnail(get_the_ID())){
                //echo get_the_post_thumbnail(get_the_ID(), 'promo_full' );
                echo '<div class="alignleft">'.get_the_post_thumbnail(get_the_ID(), 'promo_thumb' ).'</div>';
            }?>
            <?php the_content(); ?>
            <div class="clear"></div>
        </div>

    </div>
<?php get_footer(); ?>