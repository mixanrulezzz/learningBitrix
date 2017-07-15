<?php
use Bitrix\Main\Localization\Loc;

if($ex = $APPLICATION->GetException()){
    echo CAdminMessage::ShowMessage(array(
        "TYPE" => "ERROR",
        "MESSAGE" => Loc::getMessage("MOD_UNINST_ERR"),
        "DETAILS" => $ex->GetString(),
        "HTML" => true,
    ));
}
else {
    echo CAdminMessage::ShowMessage(array(
        "TYPE" => "OK",
        "MESSAGE" => Loc::getMessage("MOD_UNINST_OK"),
        "DETAILS" => $ex->GetString(),
        "HTML" => true,
    ));
}
?>
<form action="<?echo $APPLICATION->GetCurPage();?>">
    <input type="hidden" name="lang" value="<?echo LANGUAGE_ID?>">
    <input type="submit" name="" value="<? echo Loc::getMessage("MOD_BACK"); ?>">
</form>