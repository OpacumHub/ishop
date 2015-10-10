<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>
<div class="row">
	<div class="col-md-7">
		<div class="user-card">
			<div class="user-card__info">
				<a href="/?logout=yes" class="user-card__exit btn btn--exit">Выход</a>
				<div class="user-card__section user-card__name">
					<h4><?=$arResult['USER_FIELDS']['LAST_NAME'].' '.$arResult['USER_FIELDS']['NAME']?></h4>
					<p><span>Эл.почта:</span> <?=$arResult['USER_FIELDS']['EMAIL']?></p>
				</div>
				<div class="user-card__section user-card__phone">
					<p><span>Телефон:</span> <?=$arResult['USER_FIELDS']['PERSONAL_PHONE']?></p>
				</div>
				<div class="user-card__section user-card__address">
					<h5>Адрес доставки</h5>
					<p><span>Город:</span>  <?=$arResult['CITY_LIST'][$arResult['USER_FIELDS']['PERSONAL_CITY']]?></p>
					<p><span>Адрес:</span>  <?=$arResult['USER_FIELDS']['PERSONAL_STREET']?></p>
				</div>
			</div>
			<div class="user-card__control">
				<a href="?EDIT=Y" class="btn btn--black">редактировать</a>
				<a href="#" class="btn btn--light">сменить пароль</a>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="orders">
			<div class="orders__heading">
				Ваши заказы (3)
			</div>
			<div class="order-item">
				<div class="order-item__head">
					<a href="#" class="order-item__number">
						<span>0025</span>
					</a>
					<div class="order-item__date">
						28.04.2015
					</div>
					<div class="order-item__status order-item__status--new">
						новый
					</div>
				</div>
				<div class="order-item__body">
					<ul>
						<li>Apple MacBook Air 13" Core i5 1,4 ГГц, 4 ГБ, 256 ГБ Flash x <span>1</span> шт.</li>
						<li>Мышь Apple Magic Mouse беспроводная x <span>1</span> шт.</li>
						<li>Оптический привод Apple USB SuperDrive x <span>1</span> шт.</li>
						<li>Сумка Cozistyle SmartSleeve для ноутбука 13" синяя x <span>1</span> шт.</li>
					</ul>
					<div class="order-item__price">
						<div class="order-item__price__delivery">
							Доставка: 450 руб.
						</div>
						<div class="order-item__price__full">
							Итого: 4 590 pyб.
						</div>
					</div>
				</div>
			</div>
			<div class="order-item">
				<div class="order-item__head">
					<a href="#" class="order-item__number">
						<span>0167</span>
					</a>
					<div class="order-item__date">
						28.04.2015
					</div>
					<div class="order-item__status order-item__status--awaiting">
						ожидает отправки
					</div>
				</div>
				<div class="order-item__body">
					<ul>
						<li>Apple MacBook Air 13" Core i5 1,4 ГГц, 4 ГБ, 256 ГБ Flash x <span>1</span> шт.</li>
						<li>Мышь Apple Magic Mouse беспроводная x <span>1</span> шт.</li>
						<li>Оптический привод Apple USB SuperDrive x <span>1</span> шт.</li>
						<li>Сумка Cozistyle SmartSleeve для ноутбука 13" синяя x <span>1</span> шт.</li>
					</ul>
					<div class="order-item__price">
						<div class="order-item__price__delivery">
							Доставка: 450 руб.
						</div>
						<div class="order-item__price__full">
							Итого: 4 590 pyб.
						</div>
					</div>
				</div>
			</div>
			<div class="order-item">
				<div class="order-item__head">
					<a href="#" class="order-item__number">
						<span>0293</span>
					</a>
					<div class="order-item__date">
						23.04.2015
					</div>
					<div class="order-item__status order-item__status--made">
						выполнен
					</div>
				</div>
				<div class="order-item__body">
					<ul>
						<li>Apple MacBook Air 13" Core i5 1,4 ГГц, 4 ГБ, 256 ГБ Flash x <span>1</span> шт.</li>
						<li>Мышь Apple Magic Mouse беспроводная x <span>1</span> шт.</li>
						<li>Оптический привод Apple USB SuperDrive x <span>1</span> шт.</li>
						<li>Сумка Cozistyle SmartSleeve для ноутбука 13" синяя x <span>1</span> шт.</li>
					</ul>
					<div class="order-item__price">
						<div class="order-item__price__delivery">
							Доставка: 450 руб.
						</div>
						<div class="order-item__price__full">
							Итого: 4 590 pyб.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<a href="#" class="btn btn--border btn--back">вернуться в магазин</a>
	</div>
</div>