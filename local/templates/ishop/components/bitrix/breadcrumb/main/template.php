<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;


//_show_array($arResult);
//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

$strReturn .= '<ol class="breadcrumb">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	$nextRef = ($index < $itemSize-2 && $arResult[$index+1]["LINK"] <> ""? ' itemref="bx_breadcrumb_'.($index+1).'"' : '');
	$child = ($index > 0? ' itemprop="child"' : '');
	if($arResult[$index]["LINK"] == "/")
	{
		$strReturn .= '
			<li>
				<a href="'.$arResult[$index]["LINK"].'"></a>
			</li>';
	} elseif($arResult[$index]["LINK"] && $index != $itemSize-1)
	{
		$strReturn .= '
			<li>
				<a href="'.$arResult[$index]["LINK"].'">
					'.$title.'
				</a>
			</li>';
	}
	else
	{
		$strReturn .= '
			<li class="active">
				'.$title.'
			</li>';
	}
}

$strReturn .= '</ol>';

return $strReturn;
