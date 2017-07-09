<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->IncludeComponent(
    "my:vacancy.list",
    ".default",
    Array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "PAGE_SIZE" => 10,
        "DETAIL_URL" => $arParams["DETAIL_URL"],
        "LIST_URL" => $arParams["LIST_URL"],
    )
);

?>