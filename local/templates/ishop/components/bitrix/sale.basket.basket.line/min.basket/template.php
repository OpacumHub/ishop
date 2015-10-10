<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$cartId = "bx_basket".$component->getNextNumber();
$arParams['cartId'] = $cartId;
?>

<script>
	var <?=$cartId?> = new BitrixSmallCart;
</script>

<a id="<?=$cartId?>" href="<?=$arParams['PATH_TO_BASKET']?>"  class="catalog-navbar__cart-link">
    <?=GetMessage('TSB1_CART')?>
	<?if ($arParams['SHOW_NUM_PRODUCTS'] == 'Y' && ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y')) {
		echo '('.$arResult['NUM_PRODUCTS'].')';
	}?>
</a>

<script>
	<?=$cartId?>.siteId       = '<?=SITE_ID?>';
	<?=$cartId?>.cartId       = '<?=$cartId?>';
	<?=$cartId?>.ajaxPath     = '<?=$componentPath?>/ajax.php';
	<?=$cartId?>.templateName = '<?=$templateName?>';
	<?=$cartId?>.arParams     =  <?=CUtil::PhpToJSObject ($arParams)?>;
	<?=$cartId?>.closeMessage = '<?=GetMessage('TSB1_COLLAPSE')?>';
	<?=$cartId?>.openMessage  = '<?=GetMessage('TSB1_EXPAND')?>';
	<?=$cartId?>.activate();
</script>
