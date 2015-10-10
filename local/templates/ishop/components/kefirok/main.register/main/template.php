<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
    die();
?>
<?if($USER->IsAuthorized()) {?>

    <p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?} else { ?>
    <?
    if (count($arResult["ERRORS"]) > 0) {
        foreach ($arResult["ERRORS"] as $key => $error)
            if (intval($key) == 0 && $key !== 0)
                $arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;" . GetMessage("REGISTER_FIELD_" . $key) . "&quot;", $error);

        ShowError(implode("<br />", $arResult["ERRORS"]));

    }

    if (!$arResult['REQ_OK']) { ?>

        <form method="post" action="<?= POST_FORM_ACTION_URI ?>" name="regform" enctype="multipart/form-data"
              class="registration">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form__section">
                                <div class="form-title">
                                    Пользователь
                                </div>
                                <div class="form-content">
                                    <?
                                    if ($arResult["BACKURL"] <> '') {
                                        ?>
                                        <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
                                        <?
                                    }
                                    foreach ($arResult["SHOW_FIELDS"] as $FIELD) {
                                        if ($FIELD != 'CONFIRM_PASSWORD' || $FIELD != 'LOGIN')
                                            $fieldName = '';
                                        switch ($FIELD) {
                                            case 'EMAIL':
                                                $fieldName = 'Эл. почта';
                                                $validate = 'email';
                                                $type = 'text';
                                                $placeholder = '';
                                                $class = '';
                                                break;
                                            case 'PASSWORD':
                                                $fieldName = 'Пароль';
                                                $validate = 'notEmpty';
                                                $type = 'password';
                                                $placeholder = '';
                                                $class = '';
                                                break;
                                            case 'NAME':
                                                $fieldName = 'Имя';
                                                $validate = 'notEmpty';
                                                $type = 'text';
                                                $placeholder = '';
                                                $class = '';
                                                break;
                                            case 'LAST_NAME':
                                                $fieldName = 'Фамилия';
                                                $validate = 'notEmpty';
                                                $type = 'text';
                                                $placeholder = '';
                                                $class = '';
                                                break;
                                            case 'PERSONAL_PHONE':
                                                $fieldName = 'Телефон';
                                                $validate = 'phone';
                                                $placeholder = '+7 (___) ___ - __ - __';
                                                $class = 'phone';
                                                break;
                                        }
                                        in_array($FIELD, $arResult['REQUIRED_FIELDS']) ? $reqired = true : $reqired = false;
                                        ?>
                                        <div class="form-group">
                                            <label>
                                                <span><?= $fieldName ?><?= $reqired ? ' *' : '' ?></span>
                                                <input
                                                    type="<?= isset($type) && $type != '' ? $type : 'text' ?>"
                                                    name="REGISTER[<?= $FIELD ?>]"
                                                    <?= isset($placeholder) && $placeholder != '' ? 'placeholder="' . $placeholder . '"' : '' ?>
                                                    class="form-control<?= $class != '' ? ' ' . $class : '' ?><?= $reqired ? ' required' : '' ?>"
                                                    <?= $reqired && $validate ? 'data-validate="' . $validate . '"' : '' ?>
                                                    >
                                            </label>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form__section">
                                <div class="form-title">
                                    Адрес
                                </div>
                                <div class="form-content">
                                    <div class="form-group">
                                        <label>
                                            <span>Город *</span>
                                                    <span class="select">
                                                        <select class="required" name="REGISTER[PERSONAL_CITY]"
                                                                data-validate="select" id="">
                                                            <? foreach ($arResult['CITY_LIST'] as $code => $val) { ?>
                                                                <option <?= $code == DEFAULT_CITY_CODE ? 'selected="selected"' : '' ?>
                                                                    value="<?= $code ?>"><?= $val ?></option>
                                                            <? } ?>
                                                        </select>
                                                    </span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <span>Адрес</span>
                                            <textarea name="REGISTER[PERSONAL_STREET]" class="form-control"></textarea>
                                        </label>
                                    </div>
                                    <div class="form-group form-group--offset">
                                        <input type="submit" class="btn btn--black" name="register_submit_button"
                                               value="Отправить">
                                        <small class="required-inputs-text">* обязательные поля <br>для заполнения
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    <? } else { ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="reg-status reg-status--ok">
                    <h5>Ещё 1 минута, и ваш аккаунт будет доступен</h5>
                    <p>
                        На ваш электронный ящик указанные при регистрации, выслано письмо со ссылкой. <br>
                        Перейдите по данной ссылке и ваш аккаунт будет активирован.
                    </p>
                </div>
                <div class="help">
                    <h6> Что делать если письмо не приходит</h6>
                    <p>
                        1. Проверьте папку СПАМ, возможно письмо по ошибке попало туда. <br>
                        2. Если письмо нет ни в одной папке, попробуйте оформить новую регистрацию или свяжитесь с менеджером по телефону указанному внизу.
                    </p>
                </div>
            </div>
        </div>
    <?}
}?>