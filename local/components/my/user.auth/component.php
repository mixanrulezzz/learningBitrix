<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die(); ?>

<? if(!$USER->IsAuthorized()): ?>
    <? $this->IncludeComponentTemplate(); ?>
<? else: ?>
    <h3>Вы уже авторизованы</h3>
<? endif; ?>
