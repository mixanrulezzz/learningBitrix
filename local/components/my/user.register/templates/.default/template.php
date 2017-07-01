<div class="container">
    <div class="row">

        <form class="form-horizontal" action="" method="post">

            <div class="form-group ">
                <label for="inputLogin" class="col-xs-2 control-label">Логин</label>
                <div class="col-xs-9">
                    <input class="form-control" id="inputLogin" type="text" name="login" placeholder="Login" required>
                    <span id="inputLogin" class="help-block"><?=$errors["login"]?></span>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="col-xs-2 control-label">E-mail</label>
                <div class="col-xs-9">
                    <input class="form-control" id="inputEmail" type="email" name="email" placeholder="E-Mail" required>
                    <span id="inputEmail" class="help-block"><?=$errors["email"]?></span>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-xs-2 control-label">Пароль</label>
                <div class="col-xs-9">
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
                    <span id="inputPassword" class="help-block"><?=$errors["password"]?></span>
                </div>
            </div>

            <div class="form-group">
                <label for="inputRepeatPassword" class="col-xs-2 control-label">Повторите пароль</label>
                <div class="col-xs-9">
                    <input type="password" class="form-control" id="inputRepeatPassword" name="rpassword" placeholder="Repeat password" required>
                    <span id="inputRepeatPassword" class="help-block"><?=$errors["r_password"]?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-4">
                    <button type="submit" class="btn button-success">Регистрация</button>
                </div>
            </div>

        </form>
    </div>
</div>