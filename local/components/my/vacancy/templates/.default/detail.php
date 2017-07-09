<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 06.07.2017
 * Time: 14:54
 */
var_dump($arResult["VARIABLES"]);

$APPLICATION->IncludeComponent(
    "my:vacancy.detail",
    ".default",
    Array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ELEMENT_ID" => $arResult["VARIABLES"]["element_id"],
        "DETAIL_URL" => $arParams["DETAIL_URL"],
        "LIST_URL" => $arParams["LIST_URL"],
    )
);

echo "detail";