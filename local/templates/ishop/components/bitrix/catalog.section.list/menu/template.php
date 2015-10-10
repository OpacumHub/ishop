<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>
<?
if (0 < $arResult["SECTIONS_COUNT"]):?>
    <ul class="catalog-navbar__nav">
        <? foreach ($arResult['SECTIONS'] as $arSection):
            $this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
            ?>
            <li class="catalog-navbar__nav-item dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $arSection['NAME'] ?><span
                        class="glyphicon glyphicon-menu-down"></span></a>
                <? if (!empty($arSection['SUB_SECTIONS'])): ?>
                    <div class="catalog-navbar__nav-item__dropdown dropdown-menu">
                        <div class="container">
                            <ul class="catalog-navbar__nav-item__dropdown-menu catalog-navbar__nav-item__dropdown-menu--images">
                                <? foreach ($arSection['SUB_SECTIONS'] as $arSubSection): ?>
                                    <li>
                                        <a href="<?= $arSubSection['SECTION_PAGE_URL'] ?>">
                                            <? if (!empty($arSubSection['PICTURE'])): ?>
                                                <img src="<?= $arSubSection['PICTURE']['SRC'] ?>"
                                                     height="<?= $arSubSection['PICTURE']['HEIGHT'] ?>"
                                                     width="<?= $arSubSection['PICTURE']['WIDTH'] ?>"
                                                     alt="<?= $arSubSection['NAME'] ?>">
                                            <? else: ?>
                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/navimg-imac.png" height="63"
                                                     width="76" alt="">
                                            <? endif; ?>
                                            <span><?= $arSubSection['NAME'] ?></span>
                                        </a>
                                    </li>
                                <? endforeach; ?>
                                <? if (!empty($arSection['ACCESSORY'])): ?>
                                    <li>
                                        <a href="<?= $arSection['ACCESSORY']['SECTION_PAGE_URL'] ?>">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/navimg-accessory.png"
                                                 height="76" width="76" alt="">
                                            <span><?= $arSection['ACCESSORY']['NAME'] ?></span>
                                        </a>
                                    </li>
                                <? endif; ?>
                            </ul>
                        </div>
                    </div>
                <? endif; ?>
            </li>
        <? endforeach ?>
        <? if (!empty($arResult['ACCESSORY_LIST'])): ?>
            <li class="catalog-navbar__nav-item dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Аксессуары<span
                        class="glyphicon glyphicon-menu-down"></span></a>
                <div
                    class="catalog-navbar__nav-item__dropdown catalog-navbar__nav-item__dropdown--links dropdown-menu">
                    <div class="container">
                        <div class="flex-row">
                            <? foreach ($arResult['ACCESSORY_LIST'] as $arAccessory): ?>
                                <div
                                    class="catalog-navbar__nav-item__dropdown-menu catalog-navbar__nav-item__dropdown-menu--links">
                                    <h4><?= $arAccessory['TITLE'] ?></h4>
                                    <ul>
                                        <? foreach ($arAccessory['ITEMS'] as $arAccItem): ?>
                                            <li>
                                                <a href="<?= $arAccItem['SECTION_PAGE_URL'] ?>"><?= $arAccItem['NAME'] ?></a>
                                            </li>
                                        <? endforeach ?>
                                    </ul>
                                </div>
                            <? endforeach ?>
                        </div>
                    </div>
                </div>
            </li>
        <? endif ?>
    </ul>
<? endif ?>