<?php
    if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
?>

<form class="form-horizontal" action="" method="post">

    <div class="form-group">
        <label for="inputLogin" class="col-xs-2 control-label">Логин</label>
        <div class="col-xs-9">
            <input class="form-control" id="inputLogin" type="text" name="login" placeholder="Login" required>
            <span id="inputLogin" class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-xs-2 control-label">Пароль</label>
        <div class="col-xs-9">
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
            <span id="inputPassword" class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-4">
            <button type="submit" class="btn button-success">Войти</button>
        </div>
    </div>

</form>
