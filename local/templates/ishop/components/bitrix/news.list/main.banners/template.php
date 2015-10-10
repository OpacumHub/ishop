<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="s-bnrs">
    <div class="container">
        <div class="flex-row">
            <?foreach($arResult["ITEMS"] as $arItem) {
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <a  href="<?=$arItem["DISPLAY_PROPERTIES"]['BANNER_LINK']["VALUE"]?>" class="bnr bnr--dark scroll-animate">
                    <div class="bnr__image" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);"></div>
                    <div class="bnr__info">
                        <h4><?=$arItem['NAME']?></h4>
                        <p><?=$arItem["PREVIEW_TEXT"]?></p>
                        <div class="bnr__info-price">
                            <?=$arItem["DISPLAY_PROPERTIES"]['BUTTON_TEXT']["VALUE"]?>
                        </div>
                    </div>
                </a>
            <?}?>
        </div>
    </div>
</div>
