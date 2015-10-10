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
    $arResult['ERROR'][] = 'Ошибка';
} else {
        $arResult = array();

        $arResult['USER_ID'] = $USER->GetID();

        $arResult['CITY_LIST'] = CISCity::GetCityList();

        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_REQUEST["PERSONAL_EDIT"]) && $USER->IsAuthorized()) {

            $req = $_REQUEST["PERSONAL_EDIT"];

//        if (isset($req['EMAIL']) && )

            if (!$USER->Update($arResult['USER_ID'], $_REQUEST["PERSONAL_EDIT"])) {
                $arResult['ERROR'][] = $USER->LAST_ERROR;
            }
        }

        !empty($arParams['USER_PROPERTY']) && count($arParams['USER_PROPERTY']) > 0
            ? $fields = $arParams['USER_PROPERTY']
            : $fields = array();

        $rsUser = $USER->GetList($by="timestamp_x", $order="desc", array('ID' => $arResult['USER_ID']), array('FIELDS' => $fields));
        if (!$arUser = $rsUser->Fetch()) {
            $arResult['ERROR'][] = 'Ошибка';
        } else {
            $arResult['USER_FIELDS'] = $arUser;
        }
}

$this->IncludeComponentTemplate();
