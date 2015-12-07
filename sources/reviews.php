<!doctype html>
<html lang="ru">
	<?php include_once ('inc/head.html') ?>
	<body>
		<?php include_once ('inc/header.html') ?>

		<div class="wrap">
			<ul class="broad-crumbs">
				<li><a href="">Главная</a></li>
				<li><span>Отзывы</span></li>
			</ul>
		</div>

		<div class="page-contents wrap">
			<div class="header-group">
				<h3>ОТЗЫВЫ</h3>
				<a href="" class="main-btn open-rform"><i class="i-reviewplus"></i><span>Оставить отзыв</span></a>
			</div>
			<form action="" class="review-rorm">
				<div class="left-group">
					<input type="text" name="customer-name" class="text-inp" placeholder="Введите ваше имя" data-validation="required">
					<input type="text" name="customer-mail" class="text-inp" placeholder="Введите ваш e-mail" data-validation="email">
				</div>
				<div class="right-group">
					<textarea name="review-text" class="main-textarea" placeholder="Ваш отзыв" data-validation="required"></textarea>
					<input type="submit" class="submit-form" value="Оставить отзыв">
					<a href="" class="cancel-form">отмена</a>
				</div>
			</form>
			<ul class="reviws-list">
				<li>
					<h4 class="author">Мария Сергеева</h4>
					<span class="date-time">13.05.2015 в 15:27</span>
					<p class="rev-content">Проходила водительскую комиссию в медицинском центре "Качество жизни". Сначала записалась по телефону на удобный 
					для меня день и время. Когда приехала в назначенное время, меня встретила администратор, сказала, что придется 
					подождать минут десять. Ну десять минут это не критично, за это время мы заполнили карту, куда занесли все мои данные. 
					Пока ждала, расспросила у администратора какой спектр услуг они предлагают населению. Оказалось, что спектр услуг 
					очень обширный: косметология, денситометрия, лазеротерапия, озонотерапия (помню все названия, потому что мне дали
					на них на все памятки с описанием))))). Комиссию я прошла достаточно быстро. Общее впечатление осталось 
					положительным. Доктора вежливые, внимательные. Мне дали карту на пять процентов скидки на последующее 
					прохождение комиссии и на косметические процедуры.</p>
				</li>
				<li>
					<h4 class="author">Дмитрий Петров</h4>
					<span class="date-time">13.05.2015 в 15:27</span>
					<p class="rev-content">Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" 
для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров 
и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных 
изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация 
листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа 
Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>
				</li>
				<li>
					<h4 class="author">Ольга Плеханова</h4>
					<span class="date-time">13.05.2015 в 15:27</span>
					<p class="rev-content">Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят 
в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор 
латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, "consectetur", 
и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem 
Ipsum в разделах 1.10.32 и 1.10.33 книги "de Finibus Bonorum et Malorum" ("О пределах добра и зла"), написанной 
Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem 
Ipsum, "Lorem ipsum dolor sit amet..", происходит от одной из строк в разделе 1.10.32</p>
				</li>
				<li>
					<h4 class="author">Надежда Добронова</h4>
					<span class="date-time">13.05.2015 в 15:27</span>
					<p class="rev-content">Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют
 потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и 
пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..
"Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так
 что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего 
настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по 
ошибке, некоторые - намеренно (например, юмористические варианты).</p>
				</li>
			</ul>
			<div class="pagination">
				<a href="" class="to-back disabled"><i class="i-toback"></i></a>
				<a href="" class="page-number">1</a>
				<a href="" class="page-number">2</a>
				<a href="" class="page-number pre-gap">8</a>
				<a href="" class="page-number active">9</a>
				<a href="" class="page-number post-gap">10</a>
				<a href="" class="page-number">24</a>
				<a href="" class="page-number">25</a>
				<a href="" class="to-next"><i class="i-tonext"></i></a>
			</div>
		</div>

		<?php include_once ('inc/bottom-contens.html') ?>
		<?php include_once ('inc/footer.html') ?>
		
		<!-- end main mackup
			 end main mackup -->

		<?php include_once ('inc/modal-windows.html') ?>
		<?php include_once ('inc/js-sources.html') ?>
	</body>
</html>