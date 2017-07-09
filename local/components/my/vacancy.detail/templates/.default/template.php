<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $arResult;
?>
<div class="container">
    <div class="row">
        <h2><?=$arResult["ITEM"]["NAME"]?></h2>
        <p>Зарплата: от <?=$arResult["ITEM"]["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$arResult["ITEM"]["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
        <p><?=$arResult["ITEM"]["PROPERTIES"]["spec"]["NAME"]?>: <?=$arResult["ITEM"]["PROPERTIES"]["spec"]["VALUE"]?></p>
        <p><?=$arResult["ITEM"]["PROPERTIES"]["employer"]["NAME"]?>: <?=$arResult["ITEM"]["PROPERTIES"]["employer"]["OBJECT"]["NAME"]?></p>
        <p><a href="<?=$arResult["ITEM"]["LIST_PAGE_URL"]?>">Вернутся к списку</a></p>
    </div>
</div>
