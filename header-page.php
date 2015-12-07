<?php get_header('breadcrumbs'); ?>

<div class="page-contents wrap">
    <div class="header-group">
        <h1><?php the_post(); the_title();?></h1>
        <?php //global $post;
        if($post->post_name == 'preiskurant' ){
            $fx_price_link = get_post_meta(get_the_ID(),'fx_price_link', true);
            if($fx_price_link !='') {
                echo '<a href="'.$fx_price_link.'" class="main-btn"><i class="i-dwnldprice"></i><span>Скачать прейскурант</span></a>';
            }
        }
        ?>
    </div>