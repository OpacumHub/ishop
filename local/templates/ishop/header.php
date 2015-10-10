<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
CJSCore::Init(array("fx"));
?>
    <!DOCTYPE html>
    <head>
        <? $APPLICATION->ShowHead(); ?>
        <title><? $APPLICATION->ShowTitle() ?></title>
        <?
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/main.min.css");
        ?>
    </head>

    <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF">

<? $APPLICATION->ShowPanel() ?>
    <header class="main-header">
        <nav class="main-navbar">
            <div class="container">
                <div class="flex-row">
                    <div class="main-navbar__logo">
                        <? if ($APPLICATION->GetCurDir() != '/') { ?>
                            <a class="main-navbar__logo-link" href="/">
                                iShop
                            </a>
                        <? } else { ?>
                            <span class="main-navbar__logo-link">
                            iShop
                        </span>
                            <?
                        } ?>
                        <h1>
                            Ваш эксперт<br>
                            Apple
                        </h1>
                    </div>
                    <a href="#" class="main-navbar__nav-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                    <ul class="main-navbar__nav">
                        <li class="dropdown main-navbar__nav-item">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Владивосток <span
                                    class="glyphicon glyphicon-menu-down"></span></a>
                            <ul class="dropdown-menu">
                                <li class="active"><a href="#">Владивосток</a></li>
                                <li><a href="#">Хабаровск</a></li>
                                <li><a href="#">Находка</a></li>
                                <li><a href="#">Южно-Сахалинск</a></li>
                                <li><a href="#">Петропавловск-Камчатский</a></li>
                            </ul>
                        </li>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "main-navbar",
                            Array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "ROOT_MENU_TYPE" => "mainnavbar",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => array(""),
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "left",
                                "USE_EXT" => "N",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N"
                            )
                        ); ?>
                        <!--                    <li class="main-navbar__nav-item"><a href="#">О компании</a></li>-->
                        <!--                    <li class="main-navbar__nav-item"><a href="#">Оплата и доставка</a></li>-->
                        <!--                    <li class="main-navbar__nav-item"><a href="#">Где купить</a></li>-->
                        <!--                    <li class="main-navbar__nav-item"><a href="#">Акции</a></li>-->
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:system.auth.form",
                            "auth.header",
                            Array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "REGISTER_URL" => "/register/",
                                "FORGOT_PASSWORD_URL" => "/forgot-password/",
                                "PROFILE_URL" => "/personal/",
                                "SHOW_ERRORS" => "Y"
                            )
                        ); ?>
                        <!--                    <li class="main-navbar__login">-->
                        <!--                        <div class="main-navbar__login-button">-->
                        <!--                            <a class="main-navbar__login-link" href="#">Вход</a>-->
                        <!--                        </div>-->
                        <!--                        <div class="main-navbar__login-button">-->
                        <!--                            <a class="main-navbar__login-link" href="#">Регистрация</a>-->
                        <!--                        </div>-->
                        <!--                    </li>-->
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="catalog-navbar">
            <div class="container">
                <div class="flex-row">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:catalog.section.list",
                        "menu",
                        Array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "IBLOCK_TYPE" => "catalog",
                            "IBLOCK_ID" => "11",
                            "SECTION_ID" => $_REQUEST["SECTION_ID"],
                            "SECTION_CODE" => "",
                            "COUNT_ELEMENTS" => "N",
                            "TOP_DEPTH" => "2",
                            "SECTION_FIELDS" => array("", ""),
                            "SECTION_USER_FIELDS" => array("UF_NAV", "UF_ACCESSORY"),
                            "VIEW_MODE" => "LINE",
                            "SHOW_PARENT_NAME" => "Y",
                            "SECTION_URL" => "",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "36000000",
                            "CACHE_GROUPS" => "Y",
                            "ADD_SECTIONS_CHAIN" => "N"
                        )
                    ); ?>
                    <div>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:sale.basket.basket.line",
                            "min.basket",
                            array(
                                "COMPONENT_TEMPLATE" => ".default_old",
                                "PATH_TO_BASKET" => SITE_DIR . "cart/",
                                "SHOW_NUM_PRODUCTS" => "Y",
                                "SHOW_TOTAL_PRICE" => "N",
                                "SHOW_EMPTY_VALUES" => "Y",
                                "SHOW_PERSONAL_LINK" => "N",
                                "PATH_TO_PERSONAL" => SITE_DIR . "personal/",
                                "SHOW_AUTHOR" => "N",
                                "PATH_TO_REGISTER" => SITE_DIR . "login/",
                                "PATH_TO_PROFILE" => SITE_DIR . "personal/",
                                "SHOW_PRODUCTS" => "N",
                                "POSITION_FIXED" => "N"
                            ),
                            false
                        ); ?>
                        <a href="#" class="catalog-navbar__search-btn"></a>
                    </div>
                </div>
            </div>
            <form class="main-header__form-search">
                <div class="container">
                    <div class="flex-row">
                        <input type="text" class="main-header__form-search__field"
                               placeholder="Что вы хотели бы найти?">
                        <button type="submit" class="main-header__form-search__button"></button>
                    </div>
                </div>
            </form>
        </nav>
    </header>
<main class="main">
<?
if ($APPLICATION->GetCurDir() == '/') {

} ?>

<? if ($APPLICATION->GetCurDir() != '/') { ?>
    <div class="container">
    <div class="main-content">
    <div class="row">
        <div class="col-xs-12">
            <? $APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                "main",
                Array(
                    "COMPONENT_TEMPLATE" => "main",
                    "START_FROM" => "0",
                    "PATH" => "",
                    "SITE_ID" => "-"
                )
            ); ?>
            <h3 class="main-content__title"><? $APPLICATION->ShowTitle() ?></h3>
        </div>
    </div>
    <?
}

//_show_array($_SERVER["REMOTE_ADDR"]);