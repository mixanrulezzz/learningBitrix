<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

$APPLICATION->SetTitle("Вакансии");
?>

<?
$APPLICATION->IncludeComponent(
    "my:vacancy",
    ".default",
    Array(
        "SEF_FOLDER" => "/vacancy/",
        "IBLOCK_ID" => "21",
    )
);?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>