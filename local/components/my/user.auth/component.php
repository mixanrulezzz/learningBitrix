<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die(); ?>

<?
    if(!empty($_POST)) {
        if(isset($_POST["login"]) && isset($_POST["password"])) {

            $auth = $USER->Login($_POST["login"], $_POST["password"]);

            if($auth !== true) {
                ShowMessage($auth);
            }
        }
    }
?>

<? if(!$USER->IsAuthorized()): ?>
    <? $this->IncludeComponentTemplate(); ?>
<? else: ?>
    <h3>Вы уже авторизованы</h3>
<? endif; ?>
