<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?if(!empty($_POST)):?>

    <?

    if(isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["rpassword"])){
        $fields = Array(
            "LOGIN" => $_POST["login"],
            "EMAIL" => $_POST["email"],
            "PASSWORD" => $_POST["password"],
            "CONFIRM_PASSWORD" => $_POST["rpassword"],            
        );
        $new_user=$USER->Add($fields);
        
        if(intval($new_user) > 0) {
            echo "Вы успешно зарегистрированы";
        }
        else {
            echo $USER->LAST_ERROR;
            $this->IncludeComponentTemplate(); 
        }       
    }

    ?>   

<?else:?>

    <?if(!$USER->IsAuthorized()):?>
        <?$this->IncludeComponentTemplate();?>
    <?else:?>
        <h3>Вы уже авторизованы</h3>
    <?endif;?>

<?endif;?>