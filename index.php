<?php get_header();?>
    <div class="main-directions">
        <div class="wrap">
            <h3>Основные направления</h3>
            <ul>
                <li><a href="<?php echo get_permalink(6393); ?>">
                        <span><i class="i-direction1"></i></span>
                        <h4>Консультативные приемы</h4>
                    </a></li>
                <li><a href="<?php echo get_permalink(6404); ?>">
                        <span><i class="i-direction2"></i></span>
                        <h4>УЗИ</h4>
                    </a></li>
                <li><a href="<?php echo get_permalink(6405); ?>">
                        <span><i class="i-direction3"></i></span>
                        <h4>Диагностика</h4>
                    </a></li>
                <li><a href="<?php echo get_permalink(6408); ?>">
                        <span><i class="i-direction4"></i></span>
                        <h4>Гинекология</h4>
                    </a></li>
                <li><a href="<?php echo get_permalink(6409); ?>">
                        <span><i class="i-direction5"></i></span>
                        <h4>Косметология</h4>
                    </a></li>
                <li><a href="<?php echo get_permalink(6410); ?>">
                        <span><i class="i-direction6"></i></span>
                        <h4>Озонотерапия</h4>
                    </a></li>
                <li><a href="<?php echo get_permalink(173); ?>">
                        <span><i class="i-direction7"></i></span>
                        <h4>Водительская комиссия</h4>
                    </a></li>
                <li><a href="<?php echo get_permalink(176); ?>">
                        <span><i class="i-direction8"></i></span>
                        <h4>Справки на оружие</h4>
                    </a></li>
                <li><a href="<?php echo get_permalink(6407); ?>">
                        <span><i class="i-direction9"></i></span>
                        <h4>Медицинские осмотры</h4>
                    </a></li>
                <li><a href="<?php echo get_permalink(6411); ?>">
                        <span><i class="i-direction10"></i></span>
                        <h4>Лечение кожных образований</h4>
                    </a></li>
            </ul>
            <div class="services-btns">
                <a href="<?php echo get_permalink(6732); ?>" class="main-btn alt">Полный перечень услуг</a>
                <a href="<?php echo get_permalink(6370); ?>" class="main-btn">Стоимость услуг</a>
            </div>
        </div>
    </div> 

    <?php get_footer('promo'); ?>

    <div class="tomake-form">
        <div class="form-block">
            <div>
                <p>
                    <span class="decor1">Если у Вас есть</span>
                    <span class="decor2">вопросы или Вы хотите </span>
                    <span class="decor3">записаться</span>
                    <span class="decor4">на приём к врачу,</span>
                    <span class="decor5">заполните форму</span>
                </p>
            </div>
            <form id="index_form_1" action="" method="POST">
                <input type="text" name="customer-name" class="text-inp" placeholder="Введите ваше имя" data-validation="required">
                <input type="tel" name="customer-phone" class="text-inp" placeholder="Введите ваш номер телефона" data-validation="required">
                <textarea name="customer-reason" class="main-textarea" placeholder="Причина обращения"></textarea>
                <input type="submit" class="submit-form" value="Перезвонить мне">
            </form>
            <div id="message" style="display: none; font-size: 26px; margin-top: 20px;">somewhat</div>
        </div>
    </div>

    <div class="page-contents wrap">
        <div  id="header-inform" class="header-group">
            <h3>Почему мы?</h3>
            <i class="i-whitequest"></i>
        </div>
        <?php $fx_page = page_formatted('why-we');
        echo $fx_page->post_content; ?>

        <div id="hidden-inform" class="header-group">
            <h3>Информация о центре</h3>
            <i class="i-infoicon"></i>
                    </div>
        <div class="info-block about-index">

            <div class="float-link">
                <a href="" data-modal="video1" class="show-popup video-link">
                    <img src="<?php bloginfo('template_directory'); ?>/img/mainpagevideo.jpg" alt="">
                </a>
            </div>
            <?php $fx_page = page_formatted('about-index');
            echo $fx_page->post_content; ?>

        </div>
       <!--  <div class="btm-info">
            <a href="<?php echo get_permalink(28); ?>" class="some-button">Информация о центре</a>
            <a href="<?php echo get_permalink(28); ?>" class="some-button">Лицензия</a>
            <a href="<?php echo get_permalink(6369); ?>" class="some-button">Отзывы</a>
              </div> -->

    </div>

<?php
get_footer('license');
get_footer('map');
?>

<?php get_footer(); ?>