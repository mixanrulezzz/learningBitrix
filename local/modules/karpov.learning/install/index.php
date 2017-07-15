<?php

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
class karpov_learning extends CModule {

    function __construct() {
        $arModuleVersion = array();
        include(__DIR__."/version.php");

        $this->MODULE_ID = 'karpov.learning';
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

        $this->MODULE_NAME = Loc::getMessage("KARPOV_LEARNING_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("KARPOV_LEARNING_MODULE_DESC");
        $this->PARTNER_NAME = Loc::getMessage("KARPOV_LEARNING_PARTNER_NAME");
        $this->PARTNER_URI = Loc::getMessage("KARPOV_LEARNING_PARTNER_URI");
    }

    function GetPath($notDocumentRoot = false) {
        if($notDocumentRoot){
            return str_ireplace(Application::getDocumentRoot(), '', dirname(__DIR__));
        } else {
            return dirname(__DIR__);
        }
    }

    function isVersionD7() {
        return CheckVersion(\Bitrix\Main\ModuleManager::getVersion('main'), '14.00.00');
    }

    function DoInstall() {
        global $APPLICATION;
        if($this->isVersionD7()) {
            \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);
        }
        else {
            $APPLICATION->ThrowException(Loc::getMessage("KARPOV_LEARNING_INSTALL_ERROR_VERSION"));
        }

        $APPLICATION->IncludeAdminFile(Loc::getMessage("KARPOV_LEARNING_INSTALL_TITLE"), $this->GetPath()."/install/step.php");
    }

    function DoUninstall() {
        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
    }
}