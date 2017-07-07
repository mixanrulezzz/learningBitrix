<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */


/*$arDefaultUrlTemplates404 = array(
    "detail" => "#ELEMENT_ID#/",
    "list" => "",
);

$arDefaultVariableAliases404 = array();

$arDefaultVariableAliases = array();

$arComponentVariables = array(
    "SECTION_ID",
    "SECTION_CODE",
    "ELEMENT_ID",
    "ELEMENT_CODE",
);

if($arParams["SEF_MODE"] == "Y")
{
    $arVariables = array();

    $arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates($arDefaultUrlTemplates404, $arParams["SEF_URL_TEMPLATES"]);
    $arVariableAliases = CComponentEngine::MakeComponentVariableAliases($arDefaultVariableAliases404, $arParams["VARIABLE_ALIASES"]);
    $componentPage = CComponentEngine::ParseComponentPath($arParams['SEF_FOLDER'], $arUrlTemplates, $arVariables);
    CComponentEngine::InitComponentVariables($componentPage, $arComponentVariables, $arVariableAliases, $arVariables);

    var_dump($componentPage);
    die();

    $engine = new CComponentEngine($this);
    if (CModule::IncludeModule('iblock'))
    {
        $engine->addGreedyPart("#SECTION_CODE_PATH#");
        $engine->setResolveCallback(array("CIBlockFindTools", "resolveComponentEngine"));
    }
    $componentPage = $engine->guessComponentPath(
        $arParams["SEF_FOLDER"],
        $arUrlTemplates,
        $arVariables
    );

    $b404 = false;
    if(!$componentPage)
    {
        $componentPage = "list";
        $b404 = true;
    }

    if(
        $componentPage == "section"
        && isset($arVariables["SECTION_ID"])
        && intval($arVariables["SECTION_ID"])."" !== $arVariables["SECTION_ID"]
    )
        $b404 = true;

    if($b404 && CModule::IncludeModule('iblock'))
    {
        $folder404 = str_replace("\\", "/", $arParams["SEF_FOLDER"]);
        if ($folder404 != "/")
            $folder404 = "/".trim($folder404, "/ \t\n\r\0\x0B")."/";
        if (substr($folder404, -1) == "/")
            $folder404 .= "index.php";

        if ($folder404 != $APPLICATION->GetCurPage(true))
        {
            \Bitrix\Iblock\Component\Tools::process404(
                ""
                ,($arParams["SET_STATUS_404"] === "Y")
                ,($arParams["SET_STATUS_404"] === "Y")
                ,($arParams["SHOW_404"] === "Y")
                ,$arParams["FILE_404"]
            );
        }
    }



    $arResult = array(
        "FOLDER" => $arParams["SEF_FOLDER"],
        "URL_TEMPLATES" => $arUrlTemplates,
        "VARIABLES" => $arVariables,
        "ALIASES" => $arVariableAliases,
    );
}
else
{
    $arVariableAliases = CComponentEngine::MakeComponentVariableAliases($arDefaultVariableAliases, $arParams["VARIABLE_ALIASES"]);
    CComponentEngine::InitComponentVariables(false, $arComponentVariables, $arVariableAliases, $arVariables);

    $componentPage = "";

    if(isset($arVariables["ELEMENT_ID"]) && intval($arVariables["ELEMENT_ID"]) > 0)
        $componentPage = "detail";
    elseif(isset($arVariables["ELEMENT_CODE"]) && strlen($arVariables["ELEMENT_CODE"]) > 0)
        $componentPage = "detail";
    elseif(isset($arVariables["SECTION_ID"]) && intval($arVariables["SECTION_ID"]) > 0)
    {
        if(isset($arVariables["rss"]) && $arVariables["rss"]=="y")
            $componentPage = "rss_section";
        else
            $componentPage = "section";
    }
    elseif(isset($arVariables["SECTION_CODE"]) && strlen($arVariables["SECTION_CODE"]) > 0)
    {
        if(isset($arVariables["rss"]) && $arVariables["rss"]=="y")
            $componentPage = "rss_section";
        else
            $componentPage = "section";
    }
    elseif(isset($arVariables["q"]) && strlen(trim($arVariables["q"])) > 0)
        $componentPage = "search";
    elseif(isset($arVariables["tags"]) && strlen(trim($arVariables["tags"])) > 0)
        $componentPage = "search";
    elseif(isset($arVariables["rss"]) && $arVariables["rss"]=="y")
        $componentPage = "rss";
    else
        $componentPage = "news";

    $arResult = array(
        "FOLDER" => "",
        "URL_TEMPLATES" => Array(
            "news" => htmlspecialcharsbx($APPLICATION->GetCurPage()),
            "section" => htmlspecialcharsbx($APPLICATION->GetCurPage()."?".$arVariableAliases["SECTION_ID"]."=#SECTION_ID#"),
            "detail" => htmlspecialcharsbx($APPLICATION->GetCurPage()."?".$arVariableAliases["ELEMENT_ID"]."=#ELEMENT_ID#"),
            "search" => htmlspecialcharsbx($APPLICATION->GetCurPage()),
            "rss" => htmlspecialcharsbx($APPLICATION->GetCurPage()."?rss=y"),
            "rss_section" => htmlspecialcharsbx($APPLICATION->GetCurPage()."?".$arVariableAliases["SECTION_ID"]."=#SECTION_ID#&rss=y"),
        ),
        "VARIABLES" => $arVariables,
        "ALIASES" => $arVariableAliases
    );
}

$this->IncludeComponentTemplate($componentPage);*/

$arDefaultUrlTemplates404 = array(
    "list" => 'index.php',
    "detail" => '#element_id#/',
);

$arParams["SEF_MODE"] = "Y";

$arDefaultVariableAliases404 = array();
$arDefaultVariableAliases = array();
$componentPage = "";

$arComponentVariables = array("element_id");
$arCustomPagesPath = array();
$arVariables = array();

$arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates($arDefaultUrlTemplates404, $arParams["SEF_URL_TEMPLATES"]);
$arVariableAliases = CComponentEngine::MakeComponentVariableAliases($arDefaultVariableAliases404, $arParams["VARIABLE_ALIASES"]);

$componentPage = CComponentEngine::ParseComponentPath($arParams["SEF_FOLDER"], $arUrlTemplates, $arVariables);

if (empty($componentPage) || (!array_key_exists($componentPage, $arDefaultUrlTemplates404)))
    $componentPage = "404";

CComponentEngine::InitComponentVariables($componentPage, $arComponentVariables, $arVariableAliases, $arVariables);

foreach ($arUrlTemplates as $url => $value)
    $arResult["PATH_TO_".strToUpper($url)] = $arParams["SEF_FOLDER"].$value;

$arResult["VARIABLES"] = $arVariables;

$this->IncludeComponentTemplate($componentPage);
?>