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
<div class="hero-slider js-hero-slider">
<?foreach($arResult["ITEMS"] as $arItem) {?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="sld">
        <div class="hero-slider__slide" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="<?=$arItem["DISPLAY_PROPERTIES"]['BANNER_LINK']["DISPLAY_VALUE"]?>">
                            <h3 class="animate"
                                data-animate="fadeInUp"><?=$arItem['NAME']?></h3>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p class="animate"
                           data-animate="fadeInUp">
                            <?=$arItem["DISPLAY_PROPERTIES"]['BANNER_SHORT_DESCR']["DISPLAY_VALUE"]?>
                        </p>
                    </div>
                    <div class="col-md-7">
                        <div class="slide-price animate" data-animate="fadeInRight">
                            <?=$arItem["PREVIEW_TEXT"]?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="<?=$arItem["DISPLAY_PROPERTIES"]['BANNER_LINK']["DISPLAY_VALUE"]?>" class="btn btn--black btn-sm animate" data-animate="fadeInUp">купить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?}?>
</div>
