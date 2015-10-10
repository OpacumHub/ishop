<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (!empty($arResult['ERROR']) && count($arResult['ERROR'])) {
    foreach ($arResult['ERROR'] as $error) {
        ShowError($error);
    }
}
?>
<div class="row">
    <div class="col-xs-12">
        <form class="cabinet-edit" method="post" action="<?=$APPLICATION->GetCurDir()?>">
            <div class="form__section">
                <div class="form-title">
                    Пользователь
                </div>
                <div class="form-content">
                    <div class="form-group">
                        <label>
                            <span>Эл. почта *</span>
                            <input type="text" class="form-control required" name="PERSONAL_EDIT[EMAIL]" data-validate="email" value="<?=$arResult['USER_FIELDS']['EMAIL']?>">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <span>Имя *</span>
                            <input type="text" class="form-control required" name="PERSONAL_EDIT[NAME]" data-validate="notEmpty" value="<?=$arResult['USER_FIELDS']['NAME']?>">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <span>Фамилия</span>
                            <input type="text" class="form-control" name="PERSONAL_EDIT[LAST_NAME]" value="<?=$arResult['USER_FIELDS']['LAST_NAME']?>">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <span>Телефон*</span>
                            <input type="text" class="form-control phone required" name="PERSONAL_EDIT[PERSONAL_PHONE]" data-validate="phone" value="<?=$arResult['USER_FIELDS']['PERSONAL_PHONE']?>">
                        </label>
                    </div>
                </div>
            </div>
            <div class="form__section">
                <div class="form-title">
                    Адрес доставки
                </div>
                <div class="form-content">
                    <div class="form-group">
                        <label>
                            <span>Город *</span>
                            <span class="select">
                                <select class="required" name="cabinet-city-select" data-validate="select">
                                    <?foreach ($arResult['CITY_LIST'] as $key => $val) {?>
                                        <option value="<?=$key?>" <?=$arResult['USER_FIELDS']['PERSONAL_CITY'] == $key ? 'selected' : ''?>><?=$val?></option>
                                    <?}?>
                                </select>
                            </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <span>Адрес</span>
                            <textarea class="form-control"><?=$arResult['USER_FIELDS']['PERSONAL_STREET']?></textarea>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form__buttons">
                <input class="btn btn--black" type="submit" value="внести изменения">
                <button class="btn btn--light">
                    отмена
                </button>
            </div>
        </form>
    </div>
</div>