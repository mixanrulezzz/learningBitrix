<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class CVacancyList extends CBitrixComponent {

    public function executeComponent($property)
    {
        global $arResult;
        CModule::IncludeModule("iblock");

        $arSort = array(
            "active_from" => "desc",
            "name" => "asc",
        );

        $arFilter = array(
            "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
        );

        $arNavParams = array(
            "nPageSize" => $this->arParams["PAGE_SIZE"],
        );

        $arSelect = array("ID", "IBLOCK_ID", "NAME", "PROPERTY_PAYMENT", "PROPERTY_PAYMENT_UP_TO", "PROPERTY_SPEC", "PROPERTY_EMPLOYER");

        $listOfElements = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, $arSelect);
        $listOfElements->SetUrlTemplates($this->arParams["DETAIL_URL"], "", $this->arParams["LIST_URL"]);

        $element = $listOfElements->GetNextElement();
        while($element){

            $item = $element->GetFields();
            $item["PROPERTIES"] = $element->GetProperties();

            foreach ($item["PROPERTIES"] as $key => $property) {
                if($property["PROPERTY_TYPE"] == "E"){

                    $sort = array(
                        "id" => "asc",
                    );

                    $filter = array(
                        "IBLOCK_ID" => $property["LINK_IBLOCK_ID"],
                        "ID" => $property["VALUE"],
                    );

                    $rsElements = CIBlockElement::GetList($sort, $filter);
                    $rsElement = $rsElements->GetNextElement();

                    if($rsElement !== false) {
                        $item["PROPERTIES"][$key]["OBJECT"] = $rsElement->GetFields();
                    }
                }
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