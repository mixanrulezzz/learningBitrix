<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $arResult;
/*echo "<pre>";
var_dump($arResult["ITEMS"]);
echo "</pre>";*/

?>

<div class="container">

    <!--Items-->
    <? foreach ($arResult["ITEMS"] as $item): ?>

        <div class="row">
            <h3><a href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["NAME"]?></a></h3>
            <p>Зарплата: от <?=$item["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$item["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
            <p>Специализация: <?=$item["PROPERTIES"]["spec"]["VALUE"]?></p>
        </div>

    <? endforeach; ?>

    <!--Pagination-->
    <div class="row">
        <?=$arResult["NAV_STRING"];?>
    </div>

</div>

