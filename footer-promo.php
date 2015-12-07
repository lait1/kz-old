<div class="page-contents wrap">
    <div class="header-group">
        <h3>Спецпредложения</h3>
        <a href="<?php echo get_post_type_archive_link( 'promo_offer' ); ?>">другие предложения</a>
        <i class="i-spetioaloffr"></i>
    </div>
    <ul class="spetial-offers">
        <?php

        $the_query = new WP_Query( array(
            'post_type' => 'promo_offer',
            'posts_per_page' => '3',
        ) );

        while($the_query->have_posts()) {
            $the_query->the_post();

            $fx_link = get_permalink();

            echo '<li>';
            echo '<a href="'.$fx_link.'">';
            if (has_post_thumbnail(get_the_ID())){
                echo get_the_post_thumbnail(get_the_ID(), 'promo_thumb');
            }else{
                echo '<span style="width:290px; height:130px; background: #eee; display: inline-block;"> </span>';
            }
            echo '<h4>';
            the_title();
            echo '</h4></a>';
            the_excerpt();
            echo '<a href="'.$fx_link.'" class="some-button">подробнее</a>';
            echo '</li> ';
        }

        ?>
    </ul>
</div>