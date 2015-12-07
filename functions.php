<?php
register_nav_menu('header_menu', 'Главное меню');
register_nav_menu('footer', 'Меню в подвале');

register_nav_menu('services_consult', 'Услуги - Консультации');
register_nav_menu('services_uzi', 'Услуги - УЗИ');
register_nav_menu('services_diag', 'Услуги - Диагностика');
register_nav_menu('services_medosmotr', 'Услуги - Медосмотры');
register_nav_menu('services_cosmetology', 'Услуги - Косметология');
register_nav_menu('services_ginecology', 'Услуги - Гинекология');
register_nav_menu('services_ozone', 'Услуги - Озонотерапия');
register_nav_menu('services_skin', 'Услуги - Кожные заболевания');

register_nav_menu('services_consult_all', 'Все Услуги - Консультации');
register_nav_menu('services_uzi_all', 'Все Услуги - УЗИ');
register_nav_menu('services_diag_all', 'Все Услуги - Диагностика');
register_nav_menu('services_medosmotr_all', 'Все Услуги - Медосмотры');
register_nav_menu('services_cosmetology_all', 'Все Услуги - Косметология');
register_nav_menu('services_ginecology_all', 'Все Услуги - Гинекология');
register_nav_menu('services_ozone_all', 'Все Услуги - Озонотерапия');
register_nav_menu('services_skin_all', 'Все Услуги - Кожные заболевания');

register_nav_menu('footer_1', 'Подвал - слева внизу 1');
register_nav_menu('footer_2', 'Подвал - слева внизу 2');

/*====================================================================================
        order doctors by name
====================================================================================*/
add_action('pre_get_posts', function(){
    if(get_query_var('post_type') == 'doctor') {
        set_query_var('orderby', 'menu_order title');
        set_query_var('order', 'ASC');

    }
});

/*====================================================================================
        ADD IMAGES SIZES
====================================================================================*/
add_theme_support( 'post-thumbnails' );
//add_image_size('promo_thumb', 290, 130, true);

// moved to plugin

// add phpThumb support

require_once('phpthumb/phpThumb.config.php');

function the_php_thumb($src, $width, $height, $crop=true, $quality=70){
    $url = parse_url($src);

    $pars = 'src='.$url['path'];
    $pars .= '&w='.$width.'&h='.$height;
    if($crop){
        $pars .= '&zc=true';
    }
    $pars .= '&q='.$quality;
    return '<img src="'.htmlentities(phpThumbURL($pars, get_stylesheet_directory_uri().'/phpthumb/phpThumb.php')).'">';
}

/*====================================================================================
        ADJUST EXCERPT LENGTH
====================================================================================*/
function fx_custom_excerpt_length( $length ) {
    return 14;
}
add_filter( 'excerpt_length', 'fx_custom_excerpt_length', 999 );

/*====================================================================================
        template 4 reviews
====================================================================================*/
function fx_display_review($comment, $args, $depth){
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }

    echo '<li id="comment-'.get_comment_ID().'">';
    echo '<h4 class="author">'.$comment->comment_author.'</h4>';
    echo '<span class="date-time">'.get_comment_date().' в '.get_comment_time().'</span>';
    echo '<div class="rev-content">';
    comment_text();
    comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
    if ( $comment->comment_approved == '0' ) {
        echo '<p style="margin-top:10px; color:#60ADD8;"><em class="comment-awaiting-moderation">Ваш отзыв ожидает проверки</em><br /></p>';
    }
    echo '</div>';
    echo '</li>';
}

/*====================================================================================
        template 4 faq
====================================================================================*/
function fx_display_faq($comment, $args, $depth){
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

//var_dump($comment);
    if($comment -> comment_parent == 0){
        echo '<div class="questanswer-box">
                <div class="question">
                    <div class="left-side">';
        echo '<h4>'.$comment->comment_author.'</h4>';
        echo '<span>'.get_comment_date().' в '.get_comment_time().'</span>';
        echo '</div>';

        echo '<div class="right-side">';
        comment_text();
        echo'<a href="" class="show-hide">читать ответ</a>';
        echo '</div>';
        echo '</div>';

    }else{
        echo '<div class="answer">
						<header>';

        $doc_id = get_comment_meta($comment->comment_ID, 'doctor', true);
        if($doc_id != 0){
            if (has_post_thumbnail($doc_id)){
                echo  get_the_post_thumbnail($doc_id, 'thumbnail');
            }
            echo '<div>';
            echo '<span class="date-time">'.get_comment_date().' в '.get_comment_time().'</span>';

            $custom = get_post_custom($doc_id);
            echo '<strong>Отвечает '.$custom['fx_doc_surname'][0].' '.$custom['fx_doc_name'][0].'</strong>';

            echo '<ul class="about-info">';
            if($custom['fx_doc_specialty'][0] != ''){
                echo '<li>
                        <h5>Специальность и категория:</h5>
                        <strong>'.$custom['fx_doc_specialty'][0].'</strong>
                    </li>';
            }
            if($custom['fx_doc_exp'][0] != ''){
                echo '<li>
                        <h5>Стаж работы:</h5>
                        <strong>'.$custom['fx_doc_exp'][0].'</strong>
                    </li>';
            }
			echo '</ul>';

            echo '</div>';
        }else{
            echo '<div>';
            echo '<span class="date-time">'.get_comment_date().' в '.get_comment_time().'</span>';
            echo '</div>';
        }

        echo '</header>';
        echo '<div>';
        comment_text();
        echo '</div>';

    }
}


add_action( 'widgets_init', 'fx_widget_init' );
function fx_widget_init() {
    register_sidebar( array(
        'name'          => 'Подвал',
        'id'            => 'footer_1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => 'Боковая колонка',
        'id'            => 'primary_sidebar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}



/*====================================================================================
        ADD Metabox and save meta
====================================================================================*/

// doctors metabox
function fx_doctors_metabox(){
    global $post, $wpdb;

    $custom = get_post_custom($post->ID);

    $pars = fx_docs_parameters_array();

    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'fx_doctors_metabox', 'fx_doctors_metabox_nonce' );

    echo '<p>Если поле не заполнено - показываться не будет</p>';

    foreach ($pars as $par){
        echo '<p><strong>'.$par['name'].'</strong></p>';
        echo '<p><input id="'.$par['slug'].'" name="'.$par['slug'].'" value="'.$custom[$par['slug']][0].'" class="large-text" /></p>';
    }

}

//page metabox
function fx_price_metabox(){
    global $post, $wpdb;

    $custom = get_post_custom($post->ID);

    //var_dump($post);

    if($post->post_name == 'preiskurant'){
        wp_nonce_field( 'fx_price_metabox', 'fx_price_metabox_nonce' );

        echo '<p><strong>Ссылка на файл прайс листа</strong></p>';
        echo '<p><input id="fx_price_link" name="fx_price_link" value="'.$custom['fx_price_link'][0].'" class="large-text" /></p>';
    }else{
        //echo '<p>// показывается только на странице с прайсом</p>';

        //this shows select for comments
        echo '<h4>Выберите на какую тему показывать комментарии</h4>';
        echo '<p>Если нужна новая тема - создайте страницу с соответствующим названием, и выберите родительской страницу "отзывы"</p>';

        $new_query = array
        (
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => 99,
            'post_type' => 'page',
            'post_parent' => '6369' //feedback page
        );

        $new_query_fix = array
        (
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => 99,
            'post_type' => 'page',
            'post_parent' => '6740' //feedback page
        );

        $pages = get_posts($new_query);
        $pages_fix = get_posts($new_query_fix);
        $fx_comment_page_id = get_post_meta($post->ID, 'fx_comment_page_id', true);

        echo '<select name="fx_comment_page_id">';
        echo '<option value="-1">Не задан</option>';
        foreach($pages as $page){
            echo '<option value="'.$page->ID.'" ';

            if($fx_comment_page_id == $page->ID){
                echo 'selected="selected"';
            }
            echo ' >'.$page->post_title.'</option>';

            if($page->ID == '6740'){
                foreach($pages_fix as $p_fix){
                    echo '<option value="'.$p_fix->ID.'" ';

                    if($fx_comment_page_id == $p_fix->ID){
                        echo 'selected="selected"';
                    }
                    echo ' > - '.$p_fix->post_title.'</option>';
                }
            }
        }
        echo '</select>';

        //this shows list of doctors
        echo '<h4>Выберите докторов для этой страницы</h4>';
        wp_nonce_field( 'fx_price_metabox', 'fx_price_metabox_nonce' );
        // doctors checkboxes

        $new_query = array
        (
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => 99,
            'post_type' => 'doctor',
        );
        $docs = get_posts($new_query);

        $ids = get_post_meta($post->ID, 'fx_page_doc_id', true);
        //var_dump($ids);
        $ids_array = explode(',', $ids);
        $ids_array_checked = array();
        //check array
        foreach($ids_array as $val){
            if(is_numeric($val)){
                array_push($ids_array_checked, $val);
            }
        }
        //var_dump($ids_array_checked);
        foreach($docs as $doc){
            echo '<input type="checkbox" name="fx_page_doc_id[]" value="'.$doc->ID.'" ';
            foreach($ids_array_checked as $id){
                if($id == $doc->ID){
                    echo 'checked="checked"';
                }
            }
            echo ' />';
            echo '<label>'.$doc->post_title.'</label><br>';
        }
    }

}
function add_fx_doctors_metabox() {
    add_meta_box("fx_doctors_metabox", "Данные доктора", "fx_doctors_metabox", "doctor", "normal", "high");
    add_meta_box("fx_price_metabox", "Настройки страницы", "fx_price_metabox", "page", "normal", "high");
    //add_meta_box("fx_comments_metabox", "Дополнительные настройки комментария", "fx_comments_metabox", "comment", "normal", "high");
}
add_action("admin_init", 'add_fx_doctors_metabox' );

//add_action('edit_comment', 'fx_edit_comment');


add_action('save_post', 'fx_save_meta' );
function fx_save_meta() {
    global $post, $_POST;



    // Check the user's permissions
    /*if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }*/

    if ($post->post_type == 'page') {
        // Check if our nonce is set.
        if ( ! isset( $_POST['fx_price_metabox_nonce'] ) ) {
            return;
        }

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $_POST['fx_price_metabox_nonce'], 'fx_price_metabox' ) ) {
            return;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        if($post->post_name == 'preiskurant'){
            if (isset($_POST['fx_price_link'])) {
                update_post_meta($post->ID, 'fx_price_link', $_POST['fx_price_link']);
            }
        }else{
            if(!empty($_POST['fx_page_doc_id'])){
                $docs = '';
                foreach($_POST['fx_page_doc_id'] as $doc_id){
                    $docs .= $doc_id.',';
                }

                update_post_meta($post->ID, 'fx_page_doc_id', $docs);
            }else{
                update_post_meta($post->ID, 'fx_page_doc_id', '');
            }

            if(!empty($_POST['fx_comment_page_id'])){
                if($_POST['fx_comment_page_id'] == '-1'){
                    update_post_meta($post->ID, 'fx_comment_page_id', '');
                }else{
                    update_post_meta($post->ID, 'fx_comment_page_id', $_POST['fx_comment_page_id']);
                }
            }
        }
    }


    if ($post->post_type == 'doctor') {

        // Check if our nonce is set.
        if ( ! isset( $_POST['fx_doctors_metabox_nonce'] ) ) {
            return;
        }

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $_POST['fx_doctors_metabox_nonce'], 'fx_doctors_metabox' ) ) {
            return;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        $pars = fx_docs_parameters_array();
        foreach ($pars as $par){
            if (isset($_POST[$par['slug']])) {
                update_post_meta($post->ID, $par['slug'], $_POST[$par['slug']]);
            }
        }
    }
}

function fx_docs_parameters_array(){
    return array(
        /*
        array(
            'name' => 'Фамилия',
            'slug' => 'fx_doc_surname'
        ),
        array(
            'name' => 'Имя',
            'slug' => 'fx_doc_name'
        ),*/
        array(
            'name' => 'Специальность и категория',
            'slug' => 'fx_doc_specialty'
        ),
        array(
            'name' => 'Стаж работы',
            'slug' => 'fx_doc_exp'
        ),
        array(
            'name' => 'Сертификат',
            'slug' => 'fx_doc_cert'
        ),
    );
}

/*====================================================================================
        Shortcode 4 displaying menu
====================================================================================*/
add_shortcode('fx_menu', 'fx_display_menu');
function fx_display_menu($atts){
    extract(shortcode_atts(array
    (
        'id'=>'null',
        'popup'=>'1',
    ), $atts));

    if($id == 'null'){
        return '';
    }

    if($popup == '1'){
        $rt = '<ul class="shortcode_menu">';
    }else{
        $rt = '<ul class="shortcode_menu_nopopup">';
    }

    $rt.= wp_nav_menu( array( 'items_wrap'=> '%3$s', 'theme_location' => $id, 'menu_class' => 'primary-menu', 'container' => 'false', 'depth'=>'0', 'fallback_cb'=>false, 'echo'=>false ) );
    $rt.= '</ul>';

    return $rt;
}

/*====================================================================================
        Shortcode 4 displaying doctors
====================================================================================*/
add_shortcode('doctors_list', 'fx_list_doctors');
function fx_list_doctors(){
    $new_query = array
    (
        'orderby' => 'menu_order title',
        'order' => 'ASC',
        'posts_per_page' => 99,
        'post_type' => 'doctor',
    );
    $docs = get_posts($new_query);

    $rt =  '<div class="personal-and-doctors"><ul>';

    foreach($docs as $doc){
        $rt.= '<li><div class="reception-and-avatar">';

        if (has_post_thumbnail($doc->ID)){
            $rt.=  get_the_post_thumbnail($doc->ID, 'doc_thumb');
        }else{
            $rt.=  '<img src="'.get_bloginfo('template_directory').'/img/avatar.jpg" alt="">';
        }

        $rt.=  '<a href="'.$doc->guid.'" class="main-btn"><i class="i-tomake"></i><span>Подробнее</span></a>';
        $rt .= '</div>';

        $custom = get_post_custom($doc->ID);
        $rt .= '<div class="workmanship">';

        $rt .= '<strong>'.$custom['fx_doc_surname'][0].'</strong>';
        $rt .= '<p>'.$custom['fx_doc_name'][0].'</p>';


        if($custom['fx_doc_specialty'][0] != ''){
            $rt .= '<strong>Специальность и категория:</strong>';
            $rt .= '<p>'.$custom['fx_doc_specialty'][0].'</p>';
        }
        if($custom['fx_doc_exp'][0] != ''){
            $rt .= '<strong>Стаж работы:</strong>';
            $rt .= '<p>'.$custom['fx_doc_exp'][0].'</p>';
        }
        if($custom['fx_doc_cert'][0] != ''){
            $rt .= '<strong>Сертификат:</strong>';
            $rt .= '<p>'.$custom['fx_doc_cert'][0].'</p>';
        }

        $rt.=  '</div></li>';
    }
    $rt .= "</ul></div>";
    return $rt;
}

add_shortcode('doctors', 'fx_doctors_shortcode');
function fx_doctors_shortcode($atts, $content){
    extract(shortcode_atts(array
    (
        'ids'=>'null'
    ), $atts));

    if($ids == 'null'){
        return '';
    }
    $ids_array = explode(',', $ids);
    $ids_array_checked = array();
    //check array
    foreach($ids_array as $val){
        if(is_numeric($val)){
            array_push($ids_array_checked, $val);
        }
    }

    $new_query = array
    (
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => 99,
        'post_type' => 'doctor',
        'post__in' => $ids_array_checked,
    );
    $docs = get_posts($new_query);
/*
    $rt = '<div class="service-ultra-noise"><ul class="qual-person">';

    foreach ($docs as $doc){
        $rt .= '<li>';

        if (has_post_thumbnail($doc->ID)){
            $rt.=  get_the_post_thumbnail($doc->ID, 'thumbnail');
        }else{
            $rt.=  '<img src="'.get_bloginfo('template_directory').'/img/avatar150.png" alt="">';
        }

        $rt .= '<div class="proffesional-info">';
        $rt.= '<a href="'.$doc->guid.'">';

        $custom = get_post_custom($doc->ID);

        $name = explode(' ', $doc->post_title);

        $rt .= '<strong>'.$name[0].'</strong>';
        $rt .= '<p>'.$name[1].' '.$name[2].'</p>';

        $rt.= '</a>';

        if($custom['fx_doc_specialty'][0] != ''){
            $rt .= '<strong>Специальность и категория:</strong>';
            $rt .= '<p>'.$custom['fx_doc_specialty'][0].'</p>';
        }
        $rt .= '</div>';
        $rt .= '</li>';
    }

    $rt .= '</ul></div>';
*/
    $rt =  '<div class="personal-and-doctors"><ul>';

    foreach($docs as $doc){
        $rt.= fx_doc_html($doc);
    }
    $rt .= "</ul></div>";
    return $rt;
}

function fx_doc_html($doc){
    $rt= '<li><div class="reception-and-avatar">';

    if (has_post_thumbnail($doc->ID)){
        $rt .= the_php_thumb( wp_get_attachment_image_src( get_post_thumbnail_id( $doc->ID ), 'full' )[0] , 150,200);
    }else{
        $rt.=  '<img src="'.get_bloginfo('template_directory').'/img/avatar.jpg" alt="">';
    }

    $rt.=  '<a href="#" class="main-btn" data-toggle="modal" data-target="#to-make"><i class="i-tomake"></i><span>Записаться</span></a>';
    //$rt.=  '<a href="'.$doc->guid.'" class="main-btn show-popup" data-toggle="modal" data-target="#to-make"><i class="i-tomake"></i><span>Записаться</span></a>';
    $rt .= '</div>';

    $custom = get_post_custom($doc->ID);
    $rt .= '<div class="workmanship">';

    $fx_name = explode(' ', $doc->post_title);

    $rt .= '<strong>'.$fx_name[0].'</strong>';
    $rt .= '<p>'.$fx_name[1].' '.$fx_name[2].'</p>';


    if($custom['fx_doc_specialty'][0] != ''){
        $rt .= '<strong>Специальность и категория:</strong>';
        $rt .= '<p>'.$custom['fx_doc_specialty'][0].'</p>';
    }
    if($custom['fx_doc_exp'][0] != ''){
        $rt .= '<strong>Стаж работы:</strong>';
        $rt .= '<p>'.$custom['fx_doc_exp'][0].'</p>';
    }
    if($custom['fx_doc_cert'][0] != ''){
        $rt .= '<strong>Сертификат:</strong>';
        $rt .= '<p>'.$custom['fx_doc_cert'][0].'</p>';
    }

    $rt.=  '</div></li>';

    return $rt;
}
/*====================================================================================
        Comment form
====================================================================================*/
function fx_comment_form($type='null'){
    $fields =  array(

        'author' =>
            '<div class="header-group">
            <input id="author" placeholder="Введите ваше имя" class="text-inp"" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '" size="30"' . $aria_req . ' />',

        'email' =>
            '<input id="email" class="text-inp" placeholder="Введите ваш e-mail" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' />
            </div>',

        /*'url' =>
            '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
            '" size="30" /></p>',*/
    );
    $args = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'submit',
        'class_submit'      => 'submit',
        'name_submit'       => 'submit',
        'title_reply'       => __( 'Leave a Reply' ),
        'title_reply_to'    => __( 'Leave a Reply to %s' ),
        'cancel_reply_link' => __( 'Cancel Reply' ),
        'label_submit'      => __( 'Post Comment' ),
        'format'            => 'xhtml',

        'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
            '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
            '</textarea></p>',

        'must_log_in' => '<p class="must-log-in">' .
            sprintf(
                __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
                wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
            ) . '</p>',

        'logged_in_as' => '<p class="logged-in-as">' .
            sprintf(
                __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
                admin_url( 'profile.php' ),
                $user_identity,
                wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
            ) . '</p>',

        'comment_notes_before' => '<p class="comment-notes">' .
            __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
            '</p>',

        'comment_notes_after' => '',

        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
    );

    comment_form($args);
}



function page_formatted($id)
{
    if (is_integer($id))
    {
        global $page_id;

        $page_id = $id;
        $page_data = get_post( $page_id );
    }
    else
    {
        $page_data = get_page_by_path($id);
    }


    $page_data->post_content = apply_filters('the_content', $page_data->post_content);
    $page_data->post_content = str_replace(']]&gt;', ']]&amp;gt;', $page_data->post_content);

    return $page_data;
}

/*====================================================================================
        Function 4 determining feedback pages ids
====================================================================================*/
//просто чтобы опять не открывать каждую страницу и не присваивать ей нужный атрибут
function get_the_feedback_page_id($id){
    $feedback_pages = array(
        // parent page => feedback page
        '6408' => '6736',
        //'6393' => '6740',
        '6409' => '6742',
        '6411' => '6737',
        '6407' => '6741',
        '6404' => '6735',
        '6410' => '6743',
        '6405' => '6739',
        // консультативные приемы
        '91'=>'6744',
        '97'=>'6745',
        '94'=>'6746',
        '379'=>'6747',
        '411'=>'6748',
        '391'=>'6749',
        '417'=>'6750',
        '388'=>'6751',
        '786'=>'6752',
        '1026'=>'6753',
        '781'=>'6754',
        '6652'=>'6755',
);

    $ancestors = get_ancestors($id, 'page');

    foreach($ancestors as $ancestor){
        foreach($feedback_pages as $parent_page => $feedback_page){
            if($ancestor == $parent_page){
                return $feedback_page;
            }
        }
    }

    return '';
}

/*====================================================================================
        Send mail
====================================================================================*/
add_action( 'wp_ajax_nopriv_fx_submit_form', 'fx_submit_form' );
add_action( 'wp_ajax_fx_submit_form', 'fx_submit_form' );
function fx_submit_form(){
    //echo 'Ваше сообщение успешно отправлено. Спасибо.';

    //var_dump($_POST);

    $simpleFormMailRecipient = get_option('fx_email' , "sait-priem@yandex.ru");
    //$simpleFormMailRecipient = "fx3201@yandex.ru";
    $simpleFormMailFrom = "noreply@kachjizni.ru";
    $simpleFormMailSubject = "Сообщение с сайта";
    $simpleFormSuccessMessage = "Спасибо, ваша заявка успешно отправлена!";
    $simpleFormEmptyMessage = "Ошибка, поля не заполнены";
    $simpleFormErrorMessage = "Ошибка при отправке, попробуйте еще раз. Если эта ошибка повторяется, сообщите об этом администратору $simpleFormMailRecipient";

    // field descriptions (4 mail)
    $fieldnames = array(
        'customer-name' => 'Имя',
        'customer-phone' => 'Телефон',
        'Message' => 'Сообщение',
        'customer-reason' => 'Причина обращение',
        'email' => 'e-mail',
        'accept' => 'Согласен на рассылку',
        'customer-service' => 'Услуга',
        'good_date' => 'Удобная дата',
        'good_time' => 'Удобное время',
    );

    $log = "\n ";

    $log .= date("D M j Y, G:i:s T");
    // Basic header information
    $header = "From: <$simpleFormMailFrom>\n";
    $header .= "Return-path: <$simpleFormMailFrom>\n";
    $header .= "X-Sender-IP: " .$_SERVER['REMOTE_ADDR']."\n";
    $header .= "Content-Type: text/html; \n charset=utf-8 \n";

    // Construct the basic HTML for the message
    $head = "<html><body>";
    $table_start = "<table border='1' width='100%'><td align='center'><strong>Поле</strong></td><td align='center'><strong>Значение</strong></td>";

    // Fetch all the form fields and their values
    $text = "";

    $log .= "\n POST array: \n";
    foreach($_POST as $name => $value) {
        $fieldname = $name;

        if(isset($fieldnames[$name])){
            $fieldname = $fieldnames[$name];
        }

        if($value != '' && $name != 'action'){
            $text .= "<tr><td>$fieldname</td><td>$value</td></tr>";
            $log .= $name.' ('.$fieldname.') '.' => '.$value . "\n";
        }
        else{
            $log .= $name.' ('.$fieldname.') '." => empty \n";
        }


    }
    $log .= "\n";
    // End the table and add extra footer information
    $table_end = "</table>";
    $info = "<br />Сообщение отправлено с сайта: ".$_SERVER['SERVER_NAME'];
    $footer = "</body></html>";

    // Combine all the information
    $body = "$head $table_start $text $table_end $info $footer";

    // If everything is filled out correctly, send the e-mail
    if ($text != "") {
        $log .= "Text is not empty \n";
        if(mail($simpleFormMailRecipient, $simpleFormMailSubject, $body, $header)){
            $log .= "Form sent \n";
            echo $simpleFormSuccessMessage;
        }else{
            $log .= "error sending form \n";
            echo $simpleFormErrorMessage;
        }

    }else{
        echo $simpleFormEmptyMessage;
        $log .= "Text is empty \n";
    }

    //dump other vars
    $log .= "Header: $header \n";
    $log .= "Subject: $simpleFormMailSubject \n";
    $log .= "Body: $body \n";
    $log .= "Text: $text \n";

    // write log
    $f = fopen("mail_log.txt", "a+");
    fwrite($f,$log);
    fwrite($f,"\n ---------------\n\n");
    fclose($f);

    wp_die();
}

/*====================================================================================
        Options
====================================================================================*/


add_action( 'admin_menu', 'fx_bb_add_options_page' );
function fx_bb_add_options_page(){
    add_menu_page( 'Настройки КЗ', 'Настройки КЗ', 'manage_options', 'bb-options', 'mt_settings_page' );
}

// mt_settings_page() displays the page content for the Test settings submenu
function mt_settings_page() {

    //must check that the user has the required capability
    if (!current_user_can('manage_options'))
    {
        wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    // variables for the field and option names
    $options_names = array(
        'fx_show_shed' => 'Показывать рапсисание в праздники? (1 - показывать, 0 - не показывать)',
        'fx_email' => 'Куда направлять письма с форм?',
    );
    //$opt_name = 'mt_favorite_color';
    $hidden_field_name = 'mt_submit_hidden';
    //$data_field_name = 'mt_favorite_color';


    //var_dump($options_vals);
    //$opt_val = get_option( $opt_name );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        foreach( $options_names as $key => $val){
            if(isset($_POST[$key])){
                update_option( $key, $_POST[$key] );
            }
        }

        // Put a "settings saved" message on the screen
        echo '<div class="updated"><p><strong>Настройки сохранены</strong></p></div>';
    }


    // Read in existing option value from database
    $options_vals = array();
    foreach( $options_names as $key => $val){
        $options_vals[$key] = get_option($key);
    }

    // Now display the settings editing screen
    echo '<div class="wrap">';

    // header
    echo "<h2>Настройки сайта Качество Жизни</h2>";

    // settings form
    ?>

    <form name="form1" method="post" action="">
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

        <?php
        foreach( $options_names as $key => $val){
            echo '<p>'.$val.'<br>';
            echo '<input type="text" name="'.$key.'" value="'.$options_vals[$key].'" style="width:100%;">';
            echo '</p>';
        }
        ?>


        <p class="submit">
            <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
        </p>

    </form>
    </div>

<?php

}

?>