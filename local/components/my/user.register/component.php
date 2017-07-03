<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?if(!empty($_POST)):?>

    <?

    if(isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["rpassword"])){
        $filter = Array(
            "EMAIL" => $_POST["email"],
        );
        $rsUsers = CUser::GetList(($by="personal_country"), ($order="desc"), $filter);
        
        if($rsUsers->Fetch() !== false) {
            echo "Пользователь с таким email уже существует";
            die;
        }
        
        $fields = Array(
            "LOGIN" => $_POST["login"],
            "EMAIL" => $_POST["email"],
            "PASSWORD" => $_POST["password"],
            "CONFIRM_PASSWORD" => $_POST["rpassword"],
        );
        $new_user=$USER->Add($fields);
        
        if(intval($new_user) > 0) {
            echo "Вы успешно зарегистрированы";
            die;
        }
        else {
            echo $USER->LAST_ERROR;
        }
    }

    ?>

<?endif;?>

<?if(!$USER->IsAuthorized()):?>
    <?$this->IncludeComponentTemplate();?>
<?else:?>
    <h3>Вы уже авторизованы</h3>
<?endif;?>

