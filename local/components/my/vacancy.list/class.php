<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class CVacancyList extends CBitrixComponent {

    public function executeComponent()
    {
        global $arResult;
        CModule::IncludeModule("iblock");

        $elementOnPage = 10;

        $arSort = array(
            "active_from" => "desc",
            "name" => "asc",
        );

        $arFilter = array(
            "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
        );

        $arNavParams = array(
            "nPageSize" => $elementOnPage,
        );

        $arSelect = array("ID", "IBLOCK_ID", "NAME", "PROPERTY_PAYMENT", "PROPERTY_PAYMENT_UP_TO", "PROPERTY_SPEC", "PROPERTY_EMPLOYER");

        $listOfElements = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, $arSelect);
        $listOfElements->SetUrlTemplates("/vacancy/#ELEMENT_ID#/", "", "/vacancy/");

        $element = $listOfElements->GetNextElement();
        while($element){

            $item = $element->GetFields();
            $item["PROPERTIES"] = $element->GetProperties();

            $sort = array(
                "id" => "asc",
            );

            $filter = array(
                "IBLOCK_ID" => $item["PROPERTIES"]["employer"]["LINK_IBLOCK_ID"],
                "ID" => $item["PROPERTIES"]["employer"]["VALUE"],
            );

            $employer = CIBlockElement::GetList($sort, $filter);
            $employerElement = $employer->GetNextElement();

            if($employerElement !== false) {
                $item["PROPERTIES"]["employer"]["OBJECT"] = $employerElement->GetFields();
            }

            $arResult["ITEMS"][] = $item;
            $arResult["ELEMENTS"][] = $item["ID"];

            $element = $listOfElements->GetNextElement();
        }

        $arResult["NAV_STRING"] = $listOfElements->GetPageNavStringEx(
            $navComponentObject,
            "",
            "",
            "Y"
        );

        $this->includeComponentTemplate();
    }

}