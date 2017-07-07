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
    )
);?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>