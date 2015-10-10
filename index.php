<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("iShop - Ваш эксперт Apple");
?><!--Main Slider-->
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"main.slider",
	Array(
		"COMPONENT_TEMPLATE" => "main.slider",
		"IBLOCK_TYPE" => "services",
		"IBLOCK_ID" => "1",
		"NEWS_COUNT" => "5",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array("",""),
		"PROPERTY_CODE" => array("BANNER_SHORT_DESCR","BANNER_LINK",""),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	)
);?>
    <!--Main Slider.END-->
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"main.banners",
	Array(
		"COMPONENT_TEMPLATE" => "main.banners",
		"IBLOCK_TYPE" => "services",
		"IBLOCK_ID" => "2",
		"NEWS_COUNT" => "5",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array("",""),
		"PROPERTY_CODE" => array("BANNER_LINK","BUTTON_TEXT",""),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	)
);?>
<?/* $APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "main.product_slider",
    Array(
        "IBLOCK_TYPE_ID" => "catalog",
        "IBLOCK_ID" => "2",
        "BASKET_URL" => "/personal/cart/",
        "COMPONENT_TEMPLATE" => "main.product_slider",
        "IBLOCK_TYPE" => "catalog",
        "SECTION_ID" => $_REQUEST["SECTION_ID"],
        "SECTION_CODE" => "",
        "SECTION_USER_FIELDS" => array("", ""),
        "ELEMENT_SORT_FIELD" => "sort",
        "ELEMENT_SORT_ORDER" => "desc",
        "ELEMENT_SORT_FIELD2" => "id",
        "ELEMENT_SORT_ORDER2" => "desc",
        "FILTER_NAME" => "arrFilter",
        "INCLUDE_SUBSECTIONS" => "Y",
        "SHOW_ALL_WO_SECTION" => "Y",
        "HIDE_NOT_AVAILABLE" => "N",
        "PAGE_ELEMENT_COUNT" => "15",
        "LINE_ELEMENT_COUNT" => "3",
        "PROPERTY_CODE" => array("", ""),
        "OFFERS_FIELD_CODE" => array("", ""),
        "OFFERS_PROPERTY_CODE" => array("COLOR_REF", "SIZES_SHOES", "SIZES_CLOTHES", ""),
        "OFFERS_SORT_FIELD" => "sort",
        "OFFERS_SORT_ORDER" => "desc",
        "OFFERS_SORT_FIELD2" => "id",
        "OFFERS_SORT_ORDER2" => "desc",
        "OFFERS_LIMIT" => "5",
        "TEMPLATE_THEME" => "site",
        "PRODUCT_DISPLAY_MODE" => "Y",
        "ADD_PICT_PROP" => "MORE_PHOTO",
        "LABEL_PROP" => "-",
        "OFFER_ADD_PICT_PROP" => "-",
        "OFFER_TREE_PROPS" => array("COLOR_REF", "SIZES_SHOES", "SIZES_CLOTHES"),
        "PRODUCT_SUBSCRIPTION" => "N",
        "SHOW_DISCOUNT_PERCENT" => "N",
        "SHOW_OLD_PRICE" => "Y",
        "SHOW_CLOSE_POPUP" => "N",
        "MESS_BTN_BUY" => "Купить",
        "MESS_BTN_ADD_TO_BASKET" => "В корзину",
        "MESS_BTN_SUBSCRIBE" => "Подписаться",
        "MESS_BTN_DETAIL" => "Подробнее",
        "MESS_NOT_AVAILABLE" => "Нет в наличии",
        "SECTION_URL" => "",
        "DETAIL_URL" => "",
        "SECTION_ID_VARIABLE" => "SECTION_ID",
        "SEF_MODE" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_GROUPS" => "Y",
        "SET_TITLE" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "BROWSER_TITLE" => "-",
        "SET_META_KEYWORDS" => "Y",
        "META_KEYWORDS" => "-",
        "SET_META_DESCRIPTION" => "Y",
        "META_DESCRIPTION" => "-",
        "SET_LAST_MODIFIED" => "N",
        "USE_MAIN_ELEMENT_SECTION" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "ACTION_VARIABLE" => "action",
        "PRODUCT_ID_VARIABLE" => "id",
        "PRICE_CODE" => array("BASE"),
        "USE_PRICE_COUNT" => "N",
        "SHOW_PRICE_COUNT" => "1",
        "PRICE_VAT_INCLUDE" => "Y",
        "CONVERT_CURRENCY" => "N",
        "USE_PRODUCT_QUANTITY" => "N",
        "PRODUCT_QUANTITY_VARIABLE" => "",
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "PRODUCT_PROPERTIES" => array(),
        "OFFERS_CART_PROPERTIES" => array("COLOR_REF", "SIZES_SHOES", "SIZES_CLOTHES"),
        "ADD_TO_BASKET_ACTION" => "ADD",
        "PAGER_TEMPLATE" => "round",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Товары",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "MESSAGE_404" => ""
    )
); */?>
    <div class="s-products-slider">
        <ul class="nav nav-tabs nav-tabs--rounded" role="tablist">
            <li class="active">
                <a href="#products-all" aria-controls="products-all" role="tab" data-toggle="tab">ВСЕ</a>
            </li>
            <li>
                <a href="#products-new" aria-controls="products-new" role="tab" data-toggle="tab">НОВИНКИ</a>
            </li>
            <li>
                <a href="#products-bestsellers" aria-controls="products-bestsellers" role="tab" data-toggle="tab">ХИТЫ</a>
            </li>
            <li>
                <a href="#sale" aria-controls="sale" role="tab" data-toggle="tab">РАСПРОДАЖА</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="products-all">
                <div class="container">
                    <div class="product-slider carousel-slider js-product-slider">
                        <div class="sld">
                            <div class="product">
                                <a href="#">
                                    <div class="product__image">
                                        <img src="/local/templates/ishop/img/product-slider-img1.jpg" alt="">
                                    </div>
                                    <div class="product__info">
                                        <div class="product__name">
                                            Чехол Smart Case для iPad Air 2, тёмно...
                                        </div>
                                        <div class="product__price">
                                            5 490 руб.
                                        </div>
                                        <div class="product__colors">
                                            <span class="c1"></span>
                                            <span class="c2"></span>
                                            <span class="c3"></span>
                                            <span class="c4"></span>
                                            <span class="c5"></span>
                                        </div>
                                        <div class="product__article">
                                            Артикул: ABC00259
                                        </div>
                                    </div>
                                </a>
                                <div class="product__buttons">
                                    <div>
                                        <a href="#" class="btn btn--gray btn--tocart">
                                            <span> в корзину</span>
                                        </a>
                                        <a href="#" class="btn btn--light btn--oneclick">
                                            купить в 1 клик
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sld">
                            <div class="product">
                                <a href="#">
                                    <div class="product__image">
                                        <img src="/local/templates/ishop/img/product-slider-img2.jpg" alt="">
                                    </div>
                                    <div class="product__info">
                                        <div class="product__name">
                                            Трекпад Magic Trackpad
                                        </div>
                                        <div class="product__price">
                                            4 690 руб.
                                        </div>
                                        <div class="product__article">
                                            Артикул: ABC00259
                                        </div>
                                    </div>
                                </a>
                                <div class="product__buttons">
                                    <div>
                                        <a href="#" class="btn btn--gray btn--tocart">
                                            <span> в корзину</span>
                                        </a>
                                        <a href="#" class="btn btn--light btn--oneclick">
                                            купить в 1 клик
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sld">
                            <div class="product">
                                <a href="#">
                                    <div class="product__image">
                                        <img src="/local/templates/ishop/img/product-slider-img3.jpg" alt="">
                                    </div>
                                    <div class="product__info">
                                        <div class="product__name">
                                            Адаптер питания Apple USB мощностью ...
                                        </div>
                                        <div class="product__price">
                                            1 290 руб.
                                        </div>
                                        <div class="product__article">
                                            Артикул: ABC00259
                                        </div>
                                    </div>
                                </a>
                                <div class="product__buttons">
                                    <div>
                                        <a href="#" class="btn btn--gray btn--tocart">
                                            <span> в корзину</span>
                                        </a>
                                        <a href="#" class="btn btn--light btn--oneclick">
                                            купить в 1 клик
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sld">
                            <div class="product">
                                <a href="#">
                                    <div class="product__image">
                                        <img src="/local/templates/ishop/img/product-slider-img4.jpg" alt="">
                                    </div>
                                    <div class="product__info">
                                        <div class="product__name">
                                            Bluetooth-наушники Parrot Zik 2.0
                                        </div>
                                        <div class="product__price">
                                            23 290 руб.
                                        </div>
                                        <div class="product__article">
                                            Артикул: ABC00259
                                        </div>
                                    </div>
                                </a>
                                <div class="product__buttons">
                                    <div>
                                        <a href="#" class="btn btn--gray btn--tocart">
                                            <span> в корзину</span>
                                        </a>
                                        <a href="#" class="btn btn--light btn--oneclick">
                                            купить в 1 клик
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sld">
                            <div class="product">
                                <a href="#">
                                    <div class="product__image">
                                        <img src="/local/templates/ishop/img/product-slider-img1.jpg" alt="">
                                    </div>
                                    <div class="product__info">
                                        <div class="product__name">
                                            Чехол Smart Case для iPad Air 2, тёмно...
                                        </div>
                                        <div class="product__price">
                                            5 490 руб.
                                        </div>
                                        <div class="product__colors">
                                            <span class="c1"></span>
                                            <span class="c2"></span>
                                            <span class="c3"></span>
                                            <span class="c4"></span>
                                            <span class="c5"></span>
                                        </div>
                                        <div class="product__article">
                                            Артикул: ABC00259
                                        </div>
                                    </div>
                                </a>
                                <div class="product__buttons">
                                    <div>
                                        <a href="#" class="btn btn--gray btn--tocart">
                                            <span> в корзину</span>
                                        </a>
                                        <a href="#" class="btn btn--light btn--oneclick">
                                            купить в 1 клик
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sld">
                            <div class="product">
                                <a href="#">
                                    <div class="product__image">
                                        <img src="/local/templates/ishop/img/product-slider-img2.jpg" alt="">
                                    </div>
                                    <div class="product__info">
                                        <div class="product__name">
                                            Трекпад Magic Trackpad
                                        </div>
                                        <div class="product__price">
                                            4 690 руб.
                                        </div>
                                        <div class="product__article">
                                            Артикул: ABC00259
                                        </div>
                                    </div>
                                </a>
                                <div class="product__buttons">
                                    <div>
                                        <a href="#" class="btn btn--gray btn--tocart">
                                            <span> в корзину</span>
                                        </a>
                                        <a href="#" class="btn btn--light btn--oneclick">
                                            купить в 1 клик
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sld">
                            <div class="product">
                                <a href="#">
                                    <div class="product__image">
                                        <img src="/local/templates/ishop/img/product-slider-img3.jpg" alt="">
                                    </div>
                                    <div class="product__info">
                                        <div class="product__name">
                                            Адаптер питания Apple USB мощностью ...
                                        </div>
                                        <div class="product__price">
                                            1 290 руб.
                                        </div>
                                        <div class="product__article">
                                            Артикул: ABC00259
                                        </div>
                                    </div>
                                </a>
                                <div class="product__buttons">
                                    <div>
                                        <a href="#" class="btn btn--gray btn--tocart">
                                            <span> в корзину</span>
                                        </a>
                                        <a href="#" class="btn btn--light btn--oneclick">
                                            купить в 1 клик
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sld">
                            <div class="product">
                                <a href="#">
                                    <div class="product__image">
                                        <img src="/local/templates/ishop/img/product-slider-img4.jpg" alt="">
                                    </div>
                                    <div class="product__info">
                                        <div class="product__name">
                                            Bluetooth-наушники Parrot Zik 2.0
                                        </div>
                                        <div class="product__price">
                                            23 290 руб.
                                        </div>
                                        <div class="product__article">
                                            Артикул: ABC00259
                                        </div>
                                    </div>
                                </a>
                                <div class="product__buttons">
                                    <div>
                                        <a href="#" class="btn btn--gray btn--tocart">
                                            <span> в корзину</span>
                                        </a>
                                        <a href="#" class="btn btn--light btn--oneclick">
                                            купить в 1 клик
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="products-new">
                <div class="container">
                    <div class="product-slider carousel-slider js-product-slider">
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img1.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Чехол Smart Case для iPad Air 2, тёмно...
                                    </div>
                                    <div class="product__price">
                                        5 490 руб.
                                    </div>
                                    <div class="product__colors">
                                        <span class="c1"></span>
                                        <span class="c2"></span>
                                        <span class="c3"></span>
                                        <span class="c4"></span>
                                        <span class="c5"></span>
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img2.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Трекпад Magic Trackpad
                                    </div>
                                    <div class="product__price">
                                        4 690 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img3.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Адаптер питания Apple USB мощностью ...
                                    </div>
                                    <div class="product__price">
                                        1 290 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img4.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Bluetooth-наушники Parrot Zik 2.0
                                    </div>
                                    <div class="product__price">
                                        23 290 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img1.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Чехол Smart Case для iPad Air 2, тёмно...
                                    </div>
                                    <div class="product__price">
                                        5 490 руб.
                                    </div>
                                    <div class="product__colors">
                                        <span class="c1"></span>
                                        <span class="c2"></span>
                                        <span class="c3"></span>
                                        <span class="c4"></span>
                                        <span class="c5"></span>
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img2.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Трекпад Magic Trackpad
                                    </div>
                                    <div class="product__price">
                                        4 690 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img3.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Адаптер питания Apple USB мощностью ...
                                    </div>
                                    <div class="product__price">
                                        1 290 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img4.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Bluetooth-наушники Parrot Zik 2.0
                                    </div>
                                    <div class="product__price">
                                        23 290 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="products-bestsellers">
                <div class="container">
                    <div class="product-slider carousel-slider js-product-slider">
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img1.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Чехол Smart Case для iPad Air 2, тёмно...
                                    </div>
                                    <div class="product__price">
                                        5 490 руб.
                                    </div>
                                    <div class="product__colors">
                                        <span class="c1"></span>
                                        <span class="c2"></span>
                                        <span class="c3"></span>
                                        <span class="c4"></span>
                                        <span class="c5"></span>
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img2.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Трекпад Magic Trackpad
                                    </div>
                                    <div class="product__price">
                                        4 690 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img3.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Адаптер питания Apple USB мощностью ...
                                    </div>
                                    <div class="product__price">
                                        1 290 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img4.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Bluetooth-наушники Parrot Zik 2.0
                                    </div>
                                    <div class="product__price">
                                        23 290 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img1.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Чехол Smart Case для iPad Air 2, тёмно...
                                    </div>
                                    <div class="product__price">
                                        5 490 руб.
                                    </div>
                                    <div class="product__colors">
                                        <span class="c1"></span>
                                        <span class="c2"></span>
                                        <span class="c3"></span>
                                        <span class="c4"></span>
                                        <span class="c5"></span>
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img2.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Трекпад Magic Trackpad
                                    </div>
                                    <div class="product__price">
                                        4 690 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img3.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Адаптер питания Apple USB мощностью ...
                                    </div>
                                    <div class="product__price">
                                        1 290 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img4.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Bluetooth-наушники Parrot Zik 2.0
                                    </div>
                                    <div class="product__price">
                                        23 290 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="sale">
                <div class="container">
                    <div class="product-slider carousel-slider js-product-slider">
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img1.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Чехол Smart Case для iPad Air 2, тёмно...
                                    </div>
                                    <div class="product__price">
                                        5 490 руб.
                                    </div>
                                    <div class="product__colors">
                                        <span class="c1"></span>
                                        <span class="c2"></span>
                                        <span class="c3"></span>
                                        <span class="c4"></span>
                                        <span class="c5"></span>
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img2.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Трекпад Magic Trackpad
                                    </div>
                                    <div class="product__price">
                                        4 690 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img3.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Адаптер питания Apple USB мощностью ...
                                    </div>
                                    <div class="product__price">
                                        1 290 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img4.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Bluetooth-наушники Parrot Zik 2.0
                                    </div>
                                    <div class="product__price">
                                        23 290 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img1.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Чехол Smart Case для iPad Air 2, тёмно...
                                    </div>
                                    <div class="product__price">
                                        5 490 руб.
                                    </div>
                                    <div class="product__colors">
                                        <span class="c1"></span>
                                        <span class="c2"></span>
                                        <span class="c3"></span>
                                        <span class="c4"></span>
                                        <span class="c5"></span>
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img2.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Трекпад Magic Trackpad
                                    </div>
                                    <div class="product__price">
                                        4 690 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img3.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Адаптер питания Apple USB мощностью ...
                                    </div>
                                    <div class="product__price">
                                        1 290 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sld">
                            <a href="#" class="product">
                                <div class="product__image">
                                    <img src="/local/templates/ishop/img/product-slider-img4.jpg" alt="">
                                </div>
                                <div class="product__info">
                                    <div class="product__name">
                                        Bluetooth-наушники Parrot Zik 2.0
                                    </div>
                                    <div class="product__price">
                                        23 290 руб.
                                    </div>
                                    <div class="product__article">
                                        Артикул: ABC00259
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>