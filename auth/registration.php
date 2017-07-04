<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?>

<?
$APPLICATION->IncludeComponent(
    "my:user.register",
    "",
    Array()
);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>