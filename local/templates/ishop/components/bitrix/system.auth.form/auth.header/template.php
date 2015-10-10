<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//_show_array($arResult['AUTH_REGISTER_URL']);
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>
<?if($arResult["FORM_TYPE"] == "login") {?>
    <li class="main-navbar__login">
        <div class="main-navbar__login-button">
            <a class="main-navbar__login-link" href="#" data-toggle="modal" data-target="#modal-enter"><?=GetMessage("AUTH_LOGIN_TITLE")?></a>
        </div>
        <div class="main-navbar__login-button">
            <a class="main-navbar__login-link" href="/register/"><?=GetMessage("AUTH_REGISTER")?></a>
        </div>
    </li>

<?} elseif($arResult["FORM_TYPE"] == "logout"){
?>
    <li class="main-navbar__login">
        <form action="<?=$arResult["AUTH_URL"]?>">
            <div class="main-navbar__login-button">
                <a class="main-navbar__login-link" href="<?=$arResult["PROFILE_URL"]?>"><?=GetMessage("AUTH_PROFILE")?></a>
            </div>
            <div class="main-navbar__login-button">
                <?foreach ($arResult["GET"] as $key => $value):?>
                    <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
                <?endforeach?>
                <input type="hidden" name="logout" value="yes" />
                <input class="main-navbar__login-link"  type="submit" name="logout_butt" value="<?=GetMessage("AUTH_LOGOUT_BUTTON")?>" />
            </div>

        </form>
    </li>
<?}?>

