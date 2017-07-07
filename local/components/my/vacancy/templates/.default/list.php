<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->IncludeComponent(
    "my:vacancy.list",
    ".default",
    Array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    )
);

?>