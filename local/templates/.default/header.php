<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?$APPLICATION->ShowHead();?>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap.min.js"></script>
    <title><?$APPLICATION->ShowTitle()?></title>
    <link rel="stylesheet" href="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH.'/style.css');?>">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?$APPLICATION->ShowPanel()?>
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="collapsed navbar-toggle" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-9" aria-expanded="false"><span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                        <a href="/" class="navbar-brand">Bitrix</a></div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
                        <ul class="nav navbar-nav">
                            <li><a href="/auth">Авторизация</a></li>
                            <li><a href="/auth/registration.php">Регистрация</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

