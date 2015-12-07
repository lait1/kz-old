<?php get_header(); ?>
<?php get_header('page'); ?>

        <div class="page-content">
            <?php the_content(); ?>
            <div class="clear"></div>
            <?php $doctors_ids = get_post_meta($post->ID, 'fx_page_doc_id', true);
            if($doctors_ids != ''):
            ?>
                <h3>Врачи отделения:</h3>
                <?php echo do_shortcode('[doctors ids="'.$doctors_ids.'"]');
            endif; ?>
        </div>
    </div>
<?php get_footer(); ?>