<?php

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<ul class="reviws-list">

    <?php
    //temporary
    $fx_comments = get_comments(array(
        'post__not_in' => 33,
        'orderby' => 'comment_date_gmt',
        'order' => 'ASC',
        //'author__not_in' => '1',
        'status' => 'approve' //Change this to the type of comments to be displayed
    ));
    wp_list_comments(array(
        //'per_page' => 2,
        'callback' => 'fx_display_review',
    ) , $fx_comments);

    //original
    /*
    wp_list_comments(array(
        //'per_page' => 2,
        'callback' => 'fx_display_review',
    ) );
    */
    ?>
</ul>
<div class="pagination">
    <?php paginate_comments_links(array(
        'prev_text'          => '<i class="i-toback"></i>',
        'next_text'          => '<i class="i-tonext"></i>',
    )); ?>
</div>
