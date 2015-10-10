<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>

<a href="<?=$arParams['PATH_TO_BASKET']?>"  class="catalog-navbar__cart-link"><?=GetMessage('TSB1_CART')?>
    <?if ($arParams['SHOW_NUM_PRODUCTS'] == 'Y' && ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y')):?>
        <?='('.$arResult['NUM_PRODUCTS'].')'?>
    <?endif?>
</a>