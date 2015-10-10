<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
</div>
</div>
<?if (!$USER->IsAuthorized()) {?>
<div class="modal fade modal-enter" id="modal-enter" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form class="modal-form" name="auth_form" method="post" target="_top" action="<?=$APPLICATION->GetCurDir()?>">
                    <input type="hidden" name="AUTH_FORM" value="Y" />
                    <input type="hidden" name="TYPE" value="AUTH" />
                    <div class="form__section">
                        <div class="form-head">
                            <h3>Вход</h3>
                        </div>
                        <div class="form-content">
                            <div class="form-group">
                                <label>
                                    <span>Эл. почта</span>
                                    <input type="text" name="USER_LOGIN" class="form-control">
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <span>Пароль</span>
                                    <input type="password" name="USER_PASSWORD" class="form-control">
                                </label>
                            </div>
                            <div class="form-group form-group--offset spaceBetween">
                                <div class="form-remember-me checkbox-group">
                                    <label for="USER_REMEMBER_frm" title="запомнить меня">
                                        <input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y" />
                                        запомнить меня

                                    </label>
                                </div>

                                <a href="#" class="forgot-password-link">
                                    Забыли пароль?
                                </a>
                            </div>
                            <div class="form-group form-group--offset">
                                <input class="btn btn--black" type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" />
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <a href="/register/" class="modal-form-large-btn">
                Регистрация
            </a>

            <button type="button" class="modal-close" data-dismiss="modal"></button>
        </div>
    </div>
</div>
<?}?>
<?if ($APPLICATION->GetCurDir() != '/') {?>
</div>
    </div>
<?}?>
</main>
<footer class="main-footer">
    <div class="main-footer-top">
        <div class="container">
            <div class="point-of-sale flex-row">
                <div class="point-of-sale__select">
                    Точки продаж:
                    <div class="dropdown">
                        <a href="#" data-toggle="dropdown">
                            во Владивостоке
                        </a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="#">Владивосток</a></li>
                            <li><a href="#">Хабаровск</a></li>
                            <li><a href="#">Находка</a></li>
                            <li><a href="#">Южно-Сахалинск</a></li>
                            <li><a href="#">Петропавловск-Камчатский</a></li>
                        </ul>
                    </div>
                </div>
                <address class="point-of-sale__address">
                    <span>Океанский проспект, 11</span>
                    <span>Проспект 100 лет Владивостоку, 68А</span>
                </address>
                <div class="point-of-sale__phones">
                    +7 (423) 2-223-224, 2-991-009
                </div>
            </div>
        </div>
    </div>
    <div class="main-footer-nav">
        <div class="container">
            <div class="flex-row">
                <div class="footer-nav-item">
                    <div class="footer-nav-title">
                        Владивосток
                    </div>
                    <ul class="footer-nav-list">
                        <li><a href="#">Хабаровск</a></li>
                        <li><a href="#">Находка</a></li>
                        <li><a href="#">Южно-Сахалинск</a></li>
                        <li><a href="#">Петропавловск-Камчатский</a></li>
                    </ul>
                </div>
                <div class="footer-nav-item">
                    <div class="footer-nav-title">
                        Информация
                    </div>
                    <ul class="footer-nav-list">
                        <li><a href="#">Кредиты</a></li>
                        <li><a href="#">Бонусные карты PassBook</a></li>
                        <li><a href="#">Варианты оплаты товара</a></li>
                    </ul>
                </div>
                <div class="footer-nav-item">
                    <div class="footer-nav-title">
                        Клиентам
                    </div>
                    <ul class="footer-nav-list">
                        <li><a href="#">Сервисный центр</a></li>
                        <li><a href="#">Услуги</a></li>
                    </ul>
                </div>
                <div class="footer-nav-item">
                    <div class="footer-nav-title">
                        Личный кабинет
                    </div>
                    <ul class="footer-nav-list">
                        <li><a href="#">Как зарегистрироваться на сайте</a></li>
                        <li><a href="#">Оплата</a></li>
                        <li><a href="#">Доставка</a></li>
                        <li><a href="#">Самовывоз</a></li>
                        <li><a href="#">Обратная связь</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-footer-bottom">
        <div class="container">
            <div class="row no-pad">
                <div class="col-md-1 col-sm-2">
                    <a href="#" class="footer-logo">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/ishop-logo.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-md-8 col-sm-7">
                    <div class="main-footer-bottom__text">
                        <div class="row no-pad">
                            <div class="col-md-10">
                                <p>
                                    Цены в интернет-магазине и в розничных магазинах iShop могут отличаться.
                                </p>
                            </div>
                            <div class="col-md-2">
                                <div class="payment-type">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/payment-type-logos.png" height="22" width="94" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row no-pad">
                            <div class="col-md-7">
                                <small class="copyright">
                                    © 2009, Специализированный магазин “iShop”<span class="br"></span>
                                    Продукция Apple. iPhone, iPod, iMac, MacBook и аксессуары к ним.
                                </small>
                            </div>
                            <div class="col-md-5">
                                <small class="copyright">
                                    Разработка сайта - <a href="#">веб-студия Kefirok</a> <br>
                                    2015 год
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <ul class="social-list">
                        <li class="social-item">
                            <a href="#" class="social-link social-link--fb"></a>
                        </li>
                        <li class="social-item">
                            <a href="#" class="social-link social-link--vk"></a>
                        </li>
                        <li class="social-item">
                            <a href="#" class="social-link social-link--ok"></a>
                        </li>
                        <li class="social-item">
                            <a href="#" class="social-link social-link--yt"></a>
                        </li>
                        <li class="social-item">
                            <a href="#" class="social-link social-link--ig"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

<?
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/main.min.js');
?>