<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?if(!empty($_POST)):?>

    <?

    if(isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["rpassword"])){

        $valid = validation($_POST["login"], $_POST["email"], $_POST["password"], $_POST["rpassword"]);

        if(empty($valid)){

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
        } else {
            foreach ($valid as $error){
                echo $error . "<br />";
            }
        }
        

    }

    ?>

<?endif;?>

<?if(!$USER->IsAuthorized()):?>
    <?$this->IncludeComponentTemplate();?>
<?else:?>
    <h3>Вы уже авторизованы</h3>
<?endif;?>

<?php

    function validation($login, $email, $password, $rpassword){

        $errors = Array();

        /* Login */

        if( strlen($login) < 3 || strlen($login) > 20 ) {
            $errors[] = "Длина логина должна быть не менее 3 и не более 20 символов. ";
        }

        if( strrchr($login, ' ') !== false ) {
            $errors[] = "В логине не должно быть пробелов. ";
        }

        if( preg_match("/[а-я]/i", $login) ) {
            $errors[] = "В логине не должно содержаться кириллицы. ";
        }

        if( preg_match( "@[\"/\\\[\]:;\|=,\+\*?<>$#№\@\(\)\&]@", $login) ) {
            $errors[] = "В логине не должно содержаться следующих символов: \" / \\ [ ] : ; | = , + * ? < > $ # № @ ( ) & ";
        }

        /* Email */

        $filter = Array(
            "EMAIL" => $email,
        );
        $rsUsers = CUser::GetList( ($by="personal_country"), ($order="desc"), $filter );

        if($rsUsers->Fetch() !== false) {
            $errors[] = "Пользователь с таким email уже существует. ";
        }

        if( preg_match("/[а-я]/i", $email) ) {
            $errors[] = "В email не должно содержаться кириллицы. ";
        }

        /* Password */

        if( strlen($password) < 6 || strlen($password) > 20 ) {
            $errors[] = "Длина пароля должна быть не менее 6 и не более 20 символов. ";
        }

        return $errors;
    }

?>

