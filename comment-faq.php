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
<div class="questions-list">

    <?php
    wp_list_comments(array(
        'callback' => 'fx_display_faq',
        'style' => 'div',
    ) );
    ?>
</div>
<div class="pagination">
    <?php paginate_comments_links(array(
        'prev_text'          => '<i class="i-toback"></i>',
        'next_text'          => '<i class="i-tonext"></i>',
    )); ?>
</div>
