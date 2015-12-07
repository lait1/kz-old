<?php get_header(); ?>
<?php get_header('breadcrumbs'); ?>
    <div class="page-contents wrap">
        <div class="header-group">
            <h1><?php the_post(); the_title();?></h1>
            <a href="" class="main-btn open-rform"><i class="i-reviewplus"></i><span>Оставить отзыв</span></a>
        </div>
        <form action="http://kachjizni.ru/wp-comments-post.php" method="post" class="review-rorm" id="respond">
            <?php if(isset($_GET['replytocom']) && is_numeric($_GET['replytocom'])){
                $fx_replytocom = $_GET['replytocom'];
                echo "<p style='font-size: 16px;'>Ответ на отзыв #$fx_replytocom ";
                cancel_comment_reply_link( 'Отменить ответ' );
                echo "</p>";
            }else{
                $fx_replytocom = 0;
            }
            ?>
            <div class="left-group">
                <?php if(is_user_logged_in()){
                    $current_user = wp_get_current_user();
                    echo '<p style="font-size: 16px;">Комментарий будет отправлен от имени "' . $current_user->display_name . '".</p>';
                } else{ ?>
                <input type="text" name="author" class="text-inp" placeholder="Введите ваше имя" data-validation="required">
                <input type="text" name="email" class="text-inp" placeholder="Введите ваш e-mail" data-validation="email">
                <?php } ?>
            </div>
            <div class="right-group">
                <textarea name="comment" class="main-textarea" placeholder="Ваш отзыв" data-validation="required"></textarea>
                <input type="submit" class="submit-form" value="Оставить отзыв">
                <a href="" class="cancel-form">отмена</a>
            </div>
            <input name="comment_post_ID" value="<?php echo get_the_ID(); ?>" id="comment_post_ID" type="hidden">

            <input name="comment_parent" id="comment_parent" value="<?php echo $fx_replytocom ?>" type="hidden">
        </form>

        <?php //comment_form(); ?>

        <div class="page-content">

            <?php the_content(); ?>
            <?php comments_template('/comment-reviews.php'); ?>

            <?php //get_template_part('reviews'); ?>
        </div>
    </div>
<?php get_footer(); ?>