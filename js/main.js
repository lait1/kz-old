$(document).on('ready', function() {

    jQuery('.menu-divider').click(function(){
        return false;
    });

	jQuery(function($){
		$('input[type="tel"]').mask('+7(999) 99-99-999');
	});

	$.validate({
		validateOnBlur : false,
		showHelpOnFocus : false
	});

	$(function () {
		$('select').ikSelect();
	});

	// datepicker
	(function( factory ) {
		if ( typeof define === "function" && define.amd ) {
			define([ "../datepicker" ], factory );
		} else {
			factory( jQuery.datepicker );
		}
	}(function( datepicker ) {
		datepicker.regional['ru'] = {
			closeText: 'Закрыть',
			prevText: '&#x3C;Пред',
			nextText: 'След&#x3E;',
			currentText: 'Сегодня',
			monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
			'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
			monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
			'Июл','Авг','Сен','Окт','Ноя','Дек'],
			dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
			dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
			dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
			weekHeader: 'Нед',
			dateFormat: 'dd.mm.yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''};
		datepicker.setDefaults(datepicker.regional['ru']);
		return datepicker.regional['ru'];
	}));

	$('.date-selector').datepicker();

	// modal window
	$(document).ready(function() {
		$('.show-popup').on('click', function(e) {
			e.preventDefault();
			element = $(this).attr('data-modal');
			elementId = '#'+element;
			$(''+elementId+'').slideDown(500);
			$('.overlay').fadeIn(1000);
			$('body').css('overflow', 'hidden');
		});

		$('.overlay, .modal-close').on('click', function(e){
			e.preventDefault();
			$('.overlay').fadeOut(500);
			$('.modal-window').fadeOut(200);
			$('body').css('overflow', 'auto');
			var src = $(this).parent().find('iframe').attr('src');
			$(this).parent().find('iframe').attr('src', src);
		});
	});

	// animated scroll
	$("body").on("click", "a.a-animate", function(){
		var idtop = $($(this).attr("href")).offset().top;
		$('html,body').animate({scrollTop: idtop}, 600);
		return false;
	});

	// forms
	$('input,textarea').focus(function(){
		$(this).data('placeholder',$(this).attr('placeholder'))
		$(this).attr('placeholder','');
	});
	$('input,textarea').blur(function(){
		$(this).attr('placeholder',$(this).data('placeholder'));
	});

	// markcup elements
	$('.top-bar .main-menu li').each(function(){
		var list = $(this).find('li');

		if (list.length > 0)
			$($(this).addClass('has-children'));
	});

	$('body').append('<a href="" class="a-animate top-scroll"><i class="i-topup"></i><span>Наверх</span></a>');

	$('.top-scroll').on('click', function (e) {
		e.preventDefault();
		$('html,body').animate({scrollTop: 0}, 600);
	})

	$(window).scroll(function () {
		if ($(document).scrollTop() > 500)
			$('.top-scroll').fadeIn();

		else
			$('.top-scroll').fadeOut();
	});

	$('.open-rform').on('click', function (e) {
		e.preventDefault();
		$(this).parent().next().slideDown();
	});

	$('.cancel-form').on('click', function (e) {
		e.preventDefault();
		$(this).parents('form').slideUp();
	});

	$('.questanswer-box .show-hide').on('click', function (e) {
		e.preventDefault();
		$(this).toggleClass('ready-tohide');
		$(this).parents('.questanswer-box').find('div.answer').slideToggle();
	});

    $("#index_form_1").ajaxForm({
        target: '#result-message',
        data: { action: 'fx_submit_form' },
        url: '/wp-admin/admin-ajax.php',
        beforeSubmit: function(arr, $form, options){
            $("#index_form_1 .submit-form").attr('disabled', 'disabled').val('Отправка...');
        },
        success: function(){
            $("#index_form_1 .submit-form").removeAttr('disabled').val('Перезвоните мне');

            //close this popup
            $('.modal-window').fadeOut(200);

            //open result popup
            $('#result-modal').slideDown(500);
            $('.overlay').fadeIn(1000);
            $('body').css('overflow', 'hidden');
        },
        clearForm: true,
        resetForm: true
    });

    $("#appointment_form").ajaxForm({
        target: '#result-message',
        data: { action: 'fx_submit_form' },
        url: '/wp-admin/admin-ajax.php',
        beforeSubmit: function(arr, $form, options){
            $("#appointment_form .submit-form").attr('disabled', 'disabled').val('Отправка...');
        },
        success: function(){
            $("#appointment_form .submit-form").removeAttr('disabled').val('Записаться на прием');

            //close this popup
            $('.modal-window').fadeOut(200);

            //open result popup
            $('#result-modal').slideDown(500);
        },
        clearForm: true,
        resetForm: true
    });

    $("#callback_form").ajaxForm({
        target: '#result-message',
        data: { action: 'fx_submit_form' },
        url: '/wp-admin/admin-ajax.php',
        beforeSubmit: function(arr, $form, options){
            $("#callback_form .submit-form").attr('disabled', 'disabled').val('Отправка...');
        },
        success: function(){
            $("#callback_form .submit-form").removeAttr('disabled').val('Перезвоните мне');
            //$('#callback_message').fadeIn(500).delay(5000).fadeOut(500);
            //$('#appointment_message').fadeIn(500);

            //close this popup
            $('.modal-window').fadeOut(200);

            //open result popup
            $('#result-modal').slideDown(500);
        },
        clearForm: true,
        resetForm: true
    });

});