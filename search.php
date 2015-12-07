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
            <h1>Результаты поиска</h1>
        </div>

        <div class="page-content">
            <?php if(have_posts()): ?>
                <?php while(have_posts()): ?>
                    <?php
                    the_post();

                    $fx_link = get_permalink();

                    //echo '<div>';
                    echo '<h2><a href="'.$fx_link.'">'; the_title(); echo '</a></h2>';
                    echo '<div class="clear"></div>';
                    //the_content();
                    the_excerpt();
                    echo '<div class="clear"></div>';
                    echo '<a href="'.$fx_link.'" class="some-button">подробнее</a>';
                    echo '<div class="clear"></div>';
                    echo '</li> ';
                    ?>
                <?php endwhile; ?>
            <?php else: ?>
                <p>К сожалению, ничего не найдено. Измените запрос для поиска.</p>
            <?php endif; ?>
        </div>
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