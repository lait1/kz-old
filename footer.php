<?php if( !is_home() && !is_404() ):?>
    <?php if(!is_post_type_archive( 'promo_offer' )){
        get_footer('promo');
    }

    get_footer('license');
    get_footer('map');
    ?>

<?php endif; ?>
<?php if( !is_404() ): ?>
<footer class="bottom-bar">
    <div class="wrap">
        <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-links', 'container' => 'false','fallback_cb'=>false  ) ); ?>
        <div class="footer-last">
            <div class="company-details">
                <p>ООО «Качество жизни» 2004-2015</p>
                <p>Лицензия на осуществление
                    медицинской деятельности
                    № 59-01-002151 от 27.09.2013г.,
                    выдана Минздравом Пермского края</p>
                <ul class="documents-links">
                    <?php wp_nav_menu( array( 'items_wrap'=> '%3$s', 'theme_location' => 'footer_1', 'menu_class' => 'primary-menu', 'container' => 'false', 'depth'=>'-1', 'fallback_cb'=>false ) ); ?>
                </ul>
                <ul class="some-links">
                    <?php wp_nav_menu( array( 'items_wrap'=> '%3$s', 'theme_location' => 'footer_2', 'menu_class' => 'primary-menu', 'container' => 'false', 'depth'=>'-1', 'fallback_cb'=>false ) ); ?>
                </ul>
            </div>
            <address class="company-contacts">
                <ul class="phones">
                    <li>+7 (342) 255-41-37</li>
                </ul>
                <strong class="our-location">г. Пермь, ул. Крисанова, 10</strong>
                <a href="<?php echo get_permalink(31); ?>">пешком от остановки “Драмтеатр”</a>
                <a class="mail-link" href="mailto:kachjizni@mail.ru">kachjizni@mail.ru</a>
                <a href="" class="main-btn show-popup" data-modal="to-make"><i class="i-tomake"></i><span>Записаться</span></a>
            </address>
            <div class="other-maininfo">
                <h5>Следите за нами:</h5>
                <ul class="social-net">
                    <li><a target="_blank" href="https://vk.com/club55027662"><i class="i-vk"></i></a></li>
                    <li style="display:none;"><a target="_blank" href=""><i class="i-odnoklasniki"></i></a></li>
                    <li><a target="_blank" href="https://www.facebook.com/groups/717451801646401/"><i class="i-facebook"></i></a></li>
                    <li><a target="_blank" href="http://www.youtube.com/channel/UCsmvXOUCY-mwqPAfl-jk8HA"><i class="i-youtube"></i></a></li>
                </ul>
                <h5>Мы принимаем к оплате:</h5>
                <ul class="paym-method">
                    <li><i class="i-visa"></i></li>
                    <li><i class="i-mastercard"></i></li>
                </ul>
                <!--<h5>Разработка и продвижение:</h5>
                <a href="">Союз Сео Специалистов</a>-->
            </div>
        </div>
    </div>
</footer>
<?php endif; ?>
<!-- modals -->
<div class="modal-window" id="result-modal">
    <h4 id="result-message">somewhat</h4>
    <!--<p class="popup-dscr"></p>-->
    <a href="#" title="Закрыть" class="modal-close"><i class="i-close-modal"></i></a>
</div>

<div class="modal-window" id="order-call">
    <h4>Обратный звонок</h4>
    <p class="popup-dscr">Заполните все поля и наши специалисты <br> свяжутся с Вами в ближайшее время</p>
    <form id="callback_form" action="" method="post">
        <input type="text" name="customer-name" class="text-inp" placeholder="Введите ваше имя" data-validation="required">
        <input type="tel" name="customer-phone" class="text-inp" placeholder="Введите ваш номер телефона" data-validation="required">
        <input type="submit" class="submit-form" value="Перезвонить мне">
    </form>
    <p style="margin-top: 20px;font-size: 20px;text-align: center; display: none;" id="callback_message">somewhat</p>
    <a href="#" title="Закрыть" class="modal-close"><i class="i-close-modal"></i></a>
</div>

<div class="modal fade" id="to-make" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-body">
    <h4>Запись на приём к врачу</h4>
    <p class="popup-dscr">Заполните все поля и наши специалисты <br> свяжутся с Вами в ближайшее время</p>
    <form action="" id="appointment_form" method="post">
        <input type="text" name="customer-name" class="text-inp" placeholder="Введите ваше имя" data-validation="required">
        <input type="tel" name="customer-phone" class="text-inp" placeholder="Введите ваш номер телефона" data-validation="required">
        <input type="text" name="customer-service" class="text-inp" placeholder="Услуга" data-validation="required">
        <label>Желаемые дата и время приема:</label>
        <div class="good-datetime">
            <input type="text" name="good_date" class="text-inp date-selector" value="Дата">
            <span>в</span>
            <div class="time-selector">
                <select name="good_time">
                    <option value="08:00">08:00</option>
                    <option value="08:15">08:15</option>
                    <option value="08:30">08:30</option>
                    <option value="08:45">08:45</option>
                    <option value="09:00">09:00</option>
                    <option value="09:15">09:15</option>
                    <option value="09:30">09:30</option>
                    <option value="09:45">09:45</option>
                    <option value="10:00">10:00</option>
                    <option value="10:15">10:15</option>
                    <option value="10:30">10:30</option>
                    <option value="10:45">10:45</option>
                    <option value="10:00">11:00</option>
                    <option value="10:15">11:15</option>
                    <option value="10:30">11:30</option>
                    <option value="10:45">11:45</option>
                    <option value="10:00">12:00</option>
                    <option value="10:15">12:15</option>
                    <option value="10:30">12:30</option>
                    <option value="10:45">12:45</option>
                    <option value="10:00">13:00</option>
                    <option value="10:15">13:15</option>
                    <option value="10:30">13:30</option>
                    <option value="10:45">13:45</option>
                    <option value="10:00">14:00</option>
                    <option value="10:15">14:15</option>
                    <option value="10:30">14:30</option>
                    <option value="10:45">14:45</option>
                    <option value="10:00">15:00</option>
                    <option value="10:15">15:15</option>
                    <option value="10:30">15:30</option>
                    <option value="10:45">15:45</option>
                    <option value="10:00">16:00</option>
                    <option value="10:15">16:15</option>
                    <option value="10:30">16:30</option>
                    <option value="10:45">16:45</option>
                </select>
            </div>
        </div>
        <input type="submit" class="submit-form" value="Записаться на приём">
        <p class="form-undertext">Подтверждение записи на прием по обратному звонку оператора медицинского центра.</p>
        <p id="appointment_message" style="display: none; font-size: 18px; text-align: center;">somewhat</p>
    </form>
    <a href="#" data-dismiss="modal" title="Закрыть" class="modal-close"><i class="i-close-modal"></i></a>
</div>
</div>
</div>
</div>

<div class="modal-window" id="day-off-shedule">
    <h4>Расписание работы в праздники</h4>
    <?php $fx_page = page_formatted('day-off-shedule');
    echo $fx_page->post_content; ?>
    <a href="#" title="Закрыть" class="modal-close"><i class="i-close-modal"></i></a>
</div>

<?php if(is_home()): ?>
<div class="modal-window" id="video1">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/CvSXJ3OHfm8" frameborder="0" allowfullscreen></iframe>
    <a href="#" title="Закрыть" class="modal-close" id="close-video1"><i class="i-close-modal"></i></a>
</div>
<?php endif; ?>
<div class="overlay">Закрыть</div>
<!-- end modals -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php bloginfo('template_directory') ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.ikSelect.min.js"></script>
<script src="//www.youtube.com/player_api"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/main.js?v=2"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/lightbox-2.6.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/simpleform/form.js"></script>
<!--<script type="text/javascript" src="<?php /*bloginfo('template_directory') */?>/js/masonry.pkgd.min.js"></script>-->
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/Columnizer/src/jquery.columnizer.js"></script>

<?php wp_footer(); ?>

<script type="text/javascript">
/*    //masonry 4 menu
    $('.fx_services_list_menu').masonry({
        // options
        itemSelector: '.fx_services_list_menu > .menu-item',
        columnWidth: 210
    });
*/
    $('.fx_services_list_menu > .menu-item').addClass("dontsplit");
    $('.fx_services_list_menu').columnize({
        width : 210
    });
</script>

<!-- counters and other marketing stuff -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter12423694 = new Ya.Metrika({id:12423694,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/12423694" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-48466069-43', 'auto');
    ga('send', 'pageview');

</script>
<!-- LiveInternet counter-->
<script type="text/javascript">
    document.write("<a style='display:none;' href='http://www.liveinternet.ru/click' "+
    "target=_blank><img src='//counter.yadro.ru/hit?t44.6;r"+
    escape(document.referrer)+((typeof(screen)=="undefined")?"":
    ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
        screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
    ";h"+escape(document.title.substring(0,80))+";"+Math.random()+
    "' alt='' title='LiveInternet' "+
    "border='0' width='0' height='0' ><\/a>")
    </script>
    <!--/LiveInternet--> 
<script>
    jQuery(document).ready(function($){
        $(".nav-menu").click(function(){
            if ($(".collapse").hasClass("in")) {
               $(this).text("ОТКРЫТЬ меню");
            }
            else{
               $(this).text("закрыть меню"); 
            }
        });
    });

</script>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'WXPrR6jGn1';
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->


</body>
</html>