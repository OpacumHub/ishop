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
<div class="promo-list">
    <?foreach($arResult["ITEMS"] as $arItem) {
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        _show_array($arItem);?>
    <div class="promo-item">
        <div class="row">
            <div class="col-sm-4">
                <div class="promo-item__image">

                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="img-responsive" alt="">

                </div>
            </div>
            <div class="col-sm-8">
                <div class="promo-item__info">
                    <span class="promo-item__info-link"><?=$arItem['NAME']?></span>
                    <p class="promo-item__info-text"><?=$arItem["PREVIEW_TEXT"]?></p>
                    <div class="promo-valid">
                        <span>Срок действия акции:
                            <?if ($arItem["ACTIVE_TO"] && $arItem["ACTIVE_FROM"]) {
                                echo 'до '.$arItem["ACTIVE_TO"];
                            } else {
                                echo 'бессрочно';
                            }?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?}?>
</div>