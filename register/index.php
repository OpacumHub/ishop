<?
//define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?><?$APPLICATION->IncludeComponent(
	"kefirok:main.register",
	"main",
	Array(
		"SHOW_FIELDS" => array("EMAIL","NAME","LAST_NAME","PERSONAL_PHONE"),
		"REQUIRED_FIELDS" => array("EMAIL","NAME","PERSONAL_PHONE"),
		"AUTH" => "N",
		"USE_BACKURL" => "Y",
		"SUCCESS_PAGE" => "",
		"SET_TITLE" => "Y",
		"USER_PROPERTY" => array(),
		"USER_PROPERTY_NAME" => "",
		"COMPONENT_TEMPLATE" => "main"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>