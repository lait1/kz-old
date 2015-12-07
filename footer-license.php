 <div class="btm-info"><div class="wrap" style="background-color:#fff;">
            <a href="<?php echo get_permalink(28); ?>" class="some-button">Информация о центре</a>
            <a href="<?php echo get_permalink(28); ?>" class="some-button">Лицензия</a>
            <a href="<?php echo get_permalink(6369); ?>" class="some-button">Отзывы</a>
              </div></div>
<div class="licenses-rewiews wrap">
    <div class="license-block">
        <div class="header-group">
            <h3>Лицензия</h3>
            <i class="i-license"></i>
        </div>
        <div class="license-content" style="padding-bottom: 44px; padding-top: 30px;">
            <?php $fx_license = page_formatted('license');
            echo $fx_license->post_content; ?>
        </div>
        <a href="/?page_id=28" class="some-button">подробнее о центре</a>
    </div>
    <div class="rewiews-block">
        <div class="header-group">
            <h3>Отзывы</h3>
            <i class="i-rewiews"></i>
        </div>
        <?php
        //try to get the post meta
        $fx_comment_page_id = get_post_meta($GLOBALS['fx_query_page_id'],'fx_comment_page_id',true);

        //if no post meta, try to determine ancestors and get the feedback page this way
        if($fx_comment_page_id == ''){
            $fx_comment_page_id = get_the_feedback_page_id($GLOBALS['fx_query_page_id']);
        }

        if(is_numeric($fx_comment_page_id)){
            //show specific feedback
            $fx_force_show_all = false;
            $fx_comments = get_comments(array(
                'post_id' => $fx_comment_page_id,
                //'author__not_in' => '1',
                'number' => 5,
                'status' => 'approve' //Change this to the type of comments to be displayed
            ));

            if(count($fx_comments) == 0){
                $fx_force_show_all = true;
                $fx_comments = get_comments(array(
                    'post__not_in' => 33,
                    //'author__not_in' => '1',
                    'number' => 5,
                    'status' => 'approve' //Change this to the type of comments to be displayed
                ));
            }
        }else{
            //show common feedback
            $fx_comments = get_comments(array(
                'post__not_in' => 33,
                //'author__not_in' => '1',
                'number' => 5,
                'status' => 'approve' //Change this to the type of comments to be displayed
            ));
        }


        ?>
        <?php
        // bug fiz 4 authors
        // т.к. отзывы вбивают сами, мы не можем использовать 'author__not_in' => '1'
        // поэтому приходится проверять так...
        $fx_comment_index = 0;
        foreach($fx_comments as $fx_comment){
            if($fx_comments[$fx_comment_index]->comment_author != 'admin'){
                break;
            }
            $fx_comment_index++;
        }?>
        <h4><?php echo $fx_comments[$fx_comment_index]->comment_author; ?></h4>
        <p><?php echo $fx_comments[$fx_comment_index]->comment_content; ?></p>
        <footer>
            <!-- <a href="" class="read-full">полный отзыв</a> -->
            <?php if(is_numeric($fx_comment_page_id) && $fx_force_show_all == false) {
                echo '<a href="'.get_permalink($fx_comment_page_id).'" class="some-button">читать все отзывы</a>';
            }else{
                echo '<a href="'.get_permalink(6369).'" class="some-button">читать все отзывы</a>';
            }
            ?>
        </footer>
    </div>
</div>