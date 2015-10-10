<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arFormFields = array(
	"EMAIL",
	"TITLE",
	"NAME",
	"SECOND_NAME",
	"LAST_NAME",
	"AUTO_TIME_ZONE",
	"PERSONAL_PROFESSION",
	"PERSONAL_WWW",
	"PERSONAL_ICQ",
	"PERSONAL_GENDER",
	"PERSONAL_BIRTHDAY",
	"PERSONAL_PHOTO",
	"PERSONAL_PHONE",
	"PERSONAL_FAX",
	"PERSONAL_MOBILE",
	"PERSONAL_PAGER",
	"PERSONAL_STREET",
	"PERSONAL_MAILBOX",
	"PERSONAL_CITY",
	"PERSONAL_STATE",
	"PERSONAL_ZIP",
	"PERSONAL_COUNTRY",
	"PERSONAL_NOTES",
	"WORK_COMPANY",
	"WORK_DEPARTMENT",
	"WORK_POSITION",
	"WORK_WWW",
	"WORK_PHONE",
	"WORK_FAX",
	"WORK_PAGER",
	"WORK_STREET",
	"WORK_MAILBOX",
	"WORK_CITY",
	"WORK_STATE",
	"WORK_ZIP",
	"WORK_COUNTRY",
	"WORK_PROFILE",
	"WORK_LOGO",
	"WORK_NOTES",
);

$arUserFields = array();
foreach ($arFormFields as $value)
{
	$arUserFields[$value] = "[".$value."] ".GetMessage("REGISTER_FIELD_".$value);
}
$arComponentParameters = array(
	"PARAMETERS" => array(
		"SET_TITLE" => array(),
		"AJAX_MODE" => array(),
		"USER_PROPERTY"=>array(
			"PARENT" => "ADDITIONAL_SETTINGS",
			"NAME" => GetMessage("USER_PROPERTY"),
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"ADDITIONAL_VALUES" => "N",
			"VALUES" => $arUserFields,
		),
	),
);
?>