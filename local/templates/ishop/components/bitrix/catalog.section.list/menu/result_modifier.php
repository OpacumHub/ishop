<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arViewModeList = array('LIST', 'LINE', 'TEXT', 'TILE');

$arDefaultParams = array(
	'VIEW_MODE' => 'LIST',
	'SHOW_PARENT_NAME' => 'Y',
	'HIDE_SECTION_NAME' => 'N'
);

$arParams = array_merge($arDefaultParams, $arParams);

if (!in_array($arParams['VIEW_MODE'], $arViewModeList))
	$arParams['VIEW_MODE'] = 'LIST';
if ('N' != $arParams['SHOW_PARENT_NAME'])
	$arParams['SHOW_PARENT_NAME'] = 'Y';
if ('Y' != $arParams['HIDE_SECTION_NAME'])
	$arParams['HIDE_SECTION_NAME'] = 'N';

$arResult['VIEW_MODE_LIST'] = $arViewModeList;

if (0 < $arResult['SECTIONS_COUNT'])
{

		$boolClear = false;
		$arNewSections = array();

    foreach ($arResult['SECTIONS'] as &$arOneSection)
		{

            if  ($arOneSection['RELATIVE_DEPTH_LEVEL'] == 1 && $arOneSection['UF_NAV'] != 1) {
                $boolClear = true;
                continue;
            } elseif ($arOneSection['RELATIVE_DEPTH_LEVEL'] == 2 && $arOneSection['UF_NAV'] != 1) {
                $boolClear = true;
                continue;
            }
            $arFilter = Array(
                'IBLOCK_ID'=>$arParams['$IBLOCK_ID'],
                'GLOBAL_ACTIVE'=>'Y',
                'SECTION_ID'=>$arOneSection['ID']
            );
            $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);
            while($ar_result = $db_list->GetNext())
            {
                $ar_result['PICTURE'] = !empty($ar_result['PICTURE']) ? CFile::GetFileArray($ar_result['PICTURE']) : false;
                $arOneSection['SUB_SECTIONS'][] = $ar_result;
            }
            if (!empty($arOneSection['UF_ACCESSORY']))
            {

                $acc_res = CIBlockSection::GetByID($arOneSection['UF_ACCESSORY']);
                if($acc_item = $acc_res->fetch())
                {
                    $arOneSection['ACCESSORY']['ID'] = $acc_item['ID'];
                    $arOneSection['ACCESSORY']['NAME'] = $acc_item['NAME'];
                    $arOneSection['ACCESSORY']['SECTION_PAGE_URL'] = $acc_item['SECTION_PAGE_URL'];
                }
                $arrFilter = Array(
                    'IBLOCK_ID'=>$arParams['$IBLOCK_ID'],
                    'GLOBAL_ACTIVE'=>'Y',
                    'SECTION_ID'=>$arOneSection['UF_ACCESSORY']
                );
                $acc_list = CIBlockSection::GetList(Array($by=>$order), $arrFilter, false, array('ID', 'NAME', 'SECTION_PAGE_URL'));
                while($arr_result = $acc_list->GetNext())
                {
                    $arResult['ACCESSORY_LIST'][$arOneSection['ID']]['TITLE'] =  $arOneSection['ACCESSORY']['NAME'];
                    $arResult['ACCESSORY_LIST'][$arOneSection['ID']]['ITEMS'][] = $arr_result;
                }
            }
            $arNewSections[] = $arOneSection;
		}
		unset($arOneSection);


        if ($boolClear)
		{
			$arResult['SECTIONS'] = $arNewSections;
			$arResult['SECTIONS_COUNT'] = count($arNewSections);
		}
		unset($arNewSections);

}

if (0 < $arResult['SECTIONS_COUNT'])
{
	$boolPicture = false;
	$boolDescr = false;
	$arSelect = array('ID');
	$arMap = array();

    reset($arResult['SECTIONS']);
    $arCurrent = current($arResult['SECTIONS']);
    if (!isset($arCurrent['PICTURE'])) {
        $boolPicture = true;
        $arSelect[] = 'PICTURE';
    }


	if ($boolPicture || $boolDescr)
	{
		foreach ($arResult['SECTIONS'] as $key => $arSection)
		{
			$arMap[$arSection['ID']] = $key;
		}
		$rsSections = CIBlockSection::GetList(array(), array('ID' => array_keys($arMap)), false, $arSelect);
		while ($arSection = $rsSections->GetNext())
		{
			if (!isset($arMap[$arSection['ID']]))
				continue;
			$key = $arMap[$arSection['ID']];
			if ($boolPicture)
			{
				$arSection['PICTURE'] = intval($arSection['PICTURE']);
				$arSection['PICTURE'] = (0 < $arSection['PICTURE'] ? CFile::GetFileArray($arSection['PICTURE']) : false);
				$arResult['SECTIONS'][$key]['PICTURE'] = $arSection['PICTURE'];
				$arResult['SECTIONS'][$key]['~PICTURE'] = $arSection['~PICTURE'];
			}
			if ($boolDescr)
			{
				$arResult['SECTIONS'][$key]['DESCRIPTION'] = $arSection['DESCRIPTION'];
				$arResult['SECTIONS'][$key]['~DESCRIPTION'] = $arSection['~DESCRIPTION'];
				$arResult['SECTIONS'][$key]['DESCRIPTION_TYPE'] = $arSection['DESCRIPTION_TYPE'];
				$arResult['SECTIONS'][$key]['~DESCRIPTION_TYPE'] = $arSection['~DESCRIPTION_TYPE'];
			}
		}
	}
}
?>