<?
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CUserTypeManager $USER_FIELD_MANAGER
 * @param array $arParams
 * @param CBitrixComponent $this
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

if (!$USER->IsAuthorized()) {
    $arResult['ERROR'][] = 'Зарегистрируйтесь на сайте или авторизуйтесь';
} else {
    $arResult = array();

    $arResult['USER_ID'] = $USER->GetID();

    !empty($arParams['USER_PROPERTY']) && count($arParams['USER_PROPERTY']) > 0
        ? $fields = $arParams['USER_PROPERTY']
        : $fields = array();

    $rsUser = $USER->GetList($by="timestamp_x", $order="desc", array('ID' => $arResult['USER_ID']), array('FIELDS' => $fields));
     if (!$arUser = $rsUser->Fetch()) {
         $arResult['ERROR'][] = 'Ошибка вывода свойств пользователя';
     } else {
         $arResult['USER_FIELDS'] = $arUser;
     }

    $arResult['CITY_LIST'] = CISCity::GetCityList();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_REQUEST["PERSONAL_CHANGE"]) && $USER->IsAuthorized()) {

    }
}

$this->IncludeComponentTemplate();
