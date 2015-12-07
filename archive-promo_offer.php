<?php get_header(); ?>
    <div class="wrap">
        <div class="broad-crumbs">
            <ul>
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
            </ul>
        </div>
    </div>

    <div class="page-contents wrap">
        <div class="header-group">
            <h1>Спецпредложения</h1>
        </div>

        <ul class="spetial-offers">
        <?php if(have_posts()): ?>
            <?php while(have_posts()): ?>
                <?php
                the_post();

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
                ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Спецпредложений пока нет</p>
        <?php endif; ?>
    </ul>
        <div class="pagination">
            <?php
            global $wp_query;

            $big = 9999999; // need an unlikely integer

            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'prev_text'          => '<i class="i-toback"></i>',
                'next_text'          => '<i class="i-tonext"></i>',
            ) );
            ?>
        </div>

    </div>
<?php get_footer(); ?>