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
            <h1>Врачи и персонал</h1>
        </div>

    <div class="personal-and-doctors"><ul>
        <?php if(have_posts()): ?>
            <?php while(have_posts()): ?>
                <?php
                the_post();

                echo fx_doc_html($post);
                ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Докторов не найдено</p>
        <?php endif; ?>
    </ul></div>
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