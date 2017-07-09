<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 06.07.2017
 * Time: 14:54
 */

$APPLICATION->IncludeComponent(
    "my:vacancy.detail",
    ".default",
    Array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ELEMENT_ID" => $arResult["VARIABLES"]["element_id"],
        "DETAIL_PAGE_URL" => $arParams["DETAIL_PAGE_URL"],
        "LIST_PAGE_URL" => $arParams["LIST_PAGE_URL"],
    )
);