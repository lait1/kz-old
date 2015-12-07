<?php
    //save the id of page in query
    $GLOBALS['fx_query_page_id'] = get_the_ID();
?><!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=530">
    <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title( '|', true, 'right' );

        // Add the blog name.
        bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Страница %s', 'twentyeleven' ), max( $paged, $page ) );

        ?></title>
    <link href="<?php bloginfo('template_directory') ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">        
    <link href="<?php bloginfo('template_directory') ?>/css/main.css?v=2.4" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory') ?>/css/valid.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory') ?>/css/lightbox.css" rel="stylesheet" media="screen"/>
    <link href="<?php bloginfo('template_directory') ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory') ?>/css/owl.theme.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory') ?>/css/jquery-ui.min.css" rel="stylesheet">

    <!--[if IE]>
    <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/ie.js"></script>
    <![endif]-->
    <?php wp_head(); ?>

    <link href="<?php bloginfo('template_directory') ?>/override.css?v=1.2" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
<?php if(!is_404()) :?>
<header class="top-bar">
    <a href="/" class="top-panel"></a>
    <div class="topbar-firstrow">
        <div class="wrap">
            <div class="logo-block">
                <a href="/" class="logo"><img src="<?php bloginfo('template_directory') ?>/img/our-logo.png" alt=""></a>
                <h1>Многопрофильный  <br> медицинский центр</h1>
            </div>
            <div class="contacts-n-search">
                <div class="work-shedule">
                    <p><span>Пн-пт:</span> с 8-00 до 20-00</p>
                    <p><span>Суббота:</span> с 9-00 до 13-00</p>
                    <?php if(get_option('fx_show_shed') == '1') {
                        echo '<a href="#" data-modal="day-off-shedule" class="show-popup">режим работы в праздники</a>';
                    }
                    ?>
                </div>
                <address class="our-location">
                    <strong>г. Пермь, ул. Крисанова, 10</strong>
                    <a href="<?php echo get_permalink(31); ?>" class="view-route">пешком от остановки “Драмтеатр”</a>
                    <a class="mail-link" href="mailto:kachjizni@mail.ru">kachjizni@mail.ru</a>
                </address>
                <form action="/" class="site-search">
                    <input type="search" class="search-request" name="s" placeholder="Поиск по сайту">
                    <input type="submit" class="search-submit">
                </form>
            </div>
            <address class="phone-block">
                <strong><span>+7 (342)</span> <a class="phone-link" href="tel:2554137">255-41-37</a></strong>
                <a href="#" data-modal="order-call" class="main-btn alt show-popup"><i class="i-ordercall"></i><span>Перезвоните мне</span></a>
            </address>
        </div>
    </div>
    <nav class="main-menu">
        <div class="wrap">
            <?php wp_nav_menu( array( 'theme_location' => 'header_menu', 'menu_class' => 'primary-menu ', 'container' => 'false', 'fallback_cb'=>false  ) ); ?>
            <?php wp_nav_menu( array( 'theme_location' => 'header_menu', 'menu_class' => 'collapse', 'container' => 'false', 'fallback_cb'=>false  ) ); ?>
            <a href="" class="main-btn" data-target="#to-make" data-toggle="modal"><i class="i-tomake"></i><span>Записаться</span></a>
            <a href="<?php echo get_permalink(6368); ?>" class="our-services nav-services">Наши услуги</a>
            <a data-toggle="collapse" href="#menu-_glavnoe-menyu-1" class="our-services nav-menu">ОТКРЫТЬ МЕНЮ</a>
        </div>
       
    </nav>
</header>
<?php endif; ?>