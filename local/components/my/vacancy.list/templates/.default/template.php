<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $arResult;

?>

<div class="container">

    <!--Items-->
    <? foreach ($arResult["ITEMS"] as $item): ?>

        <div class="row">
            <h3><a href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["NAME"]?></a></h3>
            <p>Зарплата: от <?=$item["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$item["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
            <p><?=$item["PROPERTIES"]["spec"]["NAME"]?>: <?=$item["PROPERTIES"]["spec"]["VALUE"]?></p>
            <p><?=$item["PROPERTIES"]["employer"]["NAME"]?>: <?=$item["PROPERTIES"]["employer"]["OBJECT"]["NAME"]?></p>
        </div>

    <? endforeach; ?>

    <!--Pagination-->
    <div class="row">
        <?=$arResult["NAV_STRING"];?>
    </div>

</div>

