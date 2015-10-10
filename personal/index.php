<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Персональный раздел");

$template = 'main';

if (!empty($_REQUEST['EDIT']) && $_REQUEST['EDIT'] = 'Y') {
	$template = 'edit';
}?>
<?$APPLICATION->IncludeComponent(
	"kefirok:main.profile",
	$template,
	Array(
		"SET_TITLE" => "Y",
		"COMPONENT_TEMPLATE" => "main",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"USER_PROPERTY" => array("EMAIL","NAME","LAST_NAME","PERSONAL_PHONE","PERSONAL_CITY","PERSONAL_STREET"),
		"SEND_INFO" => "N",
		"CHECK_RIGHTS" => "N",
		"USER_PROPERTY_NAME" => ""
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
