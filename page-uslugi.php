<?php get_header(); ?>
<?php get_header('page'); ?>

    <ul class="services-list">
    <li>
        <img src="<?php bloginfo('template_directory'); ?>/img/services1.png" alt="">
        <h4>Консультативные приемы</h4>
        <ul class="fx_services_list_menu">
            <?php wp_nav_menu( array( 'items_wrap'=> '%3$s', 'theme_location' => 'services_consult', 'menu_class' => 'primary-menu', 'container' => 'false', 'depth'=>'2', 'fallback_cb'=>false ) ); ?>
        </ul>
    </li>
    <li>
        <img src="<?php bloginfo('template_directory'); ?>/img/services2.png" alt="">
        <h4>УЗИ</h4>
        <ul class="fx_services_list_menu">
            <?php wp_nav_menu( array( 'items_wrap'=> '%3$s', 'theme_location' => 'services_uzi', 'menu_class' => 'primary-menu', 'container' => 'false', 'depth'=>'2', 'fallback_cb'=>false ) ); ?>
        </ul>
    </li>
    <li>
        <img src="<?php bloginfo('template_directory'); ?>/img/services3.png" alt="">
        <h4><a href="/?page_id=173">Водительская комисия</a></h4>
    </li>
    <li>
        <img src="<?php bloginfo('template_directory'); ?>/img/services4.png" alt="">
        <h4><a href="/?page_id=176">Справка на оружие</a></h4>
    </li>
    <li>
        <img src="<?php bloginfo('template_directory'); ?>/img/services5.png" alt="">
        <h4>Функциональная диагностика</h4>
        <ul class="fx_services_list_menu">
            <?php wp_nav_menu( array( 'items_wrap'=> '%3$s', 'theme_location' => 'services_diag', 'menu_class' => 'primary-menu', 'container' => 'false', 'depth'=>'2', 'fallback_cb'=>false ) ); ?>
        </ul>
    </li>
    <li>
        <img src="<?php bloginfo('template_directory'); ?>/img/services6.png" alt="">
        <h4>Медицинские осмотры, справки</h4>
        <ul class="fx_services_list_menu">
            <?php wp_nav_menu( array( 'items_wrap'=> '%3$s', 'theme_location' => 'services_medosmotr', 'menu_class' => 'primary-menu', 'container' => 'false', 'depth'=>'2', 'fallback_cb'=>false ) ); ?>
        </ul>
    </li>
    <li class="hidden">
        <img src="<?php bloginfo('template_directory'); ?>/img/services7.png" alt="">
        <h4>Гинекология</h4>
        <ul class="fx_services_list_menu">
            <?php wp_nav_menu( array( 'items_wrap'=> '%3$s', 'theme_location' => 'services_ginecology', 'menu_class' => 'primary-menu', 'container' => 'false', 'depth'=>'2', 'fallback_cb'=>false ) ); ?>
        </ul>
    </li>
    <li>
        <img src="<?php bloginfo('template_directory'); ?>/img/services8.png" alt="">
        <h4>Косметология</h4>
        <ul class="fx_services_list_menu">
            <?php wp_nav_menu( array( 'items_wrap'=> '%3$s', 'theme_location' => 'services_cosmetology', 'menu_class' => 'primary-menu', 'container' => 'false', 'depth'=>'2', 'fallback_cb'=>false ) ); ?>
        </ul>
    </li>
    <li>
        <img src="<?php bloginfo('template_directory'); ?>/img/services9.png" alt="">
        <h4>Озонотерапия</h4>
        <ul class="fx_services_list_menu">
            <?php wp_nav_menu( array( 'items_wrap'=> '%3$s', 'theme_location' => 'services_ozone', 'menu_class' => 'primary-menu', 'container' => 'false', 'depth'=>'2', 'fallback_cb'=>false ) ); ?>
        </ul>
    </li>
    <li>
        <img src="<?php bloginfo('template_directory'); ?>/img/services10.png" alt="">
        <h4>Лечение кожных образований</h4>
        <ul class="fx_services_list_menu">
            <?php wp_nav_menu( array( 'items_wrap'=> '%3$s', 'theme_location' => 'services_skin', 'menu_class' => 'primary-menu', 'container' => 'false', 'depth'=>'2', 'fallback_cb'=>false ) ); ?>
        </ul>
    </li>
    </ul>
    </div>
<?php get_footer(); ?>