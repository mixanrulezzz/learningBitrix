<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class CVacancyDetail extends CBitrixComponent {

    public function executeComponent($rsVacancy)
    {
        global $arResult;
        CModule::IncludeModule("iblock");

        $arSort = array(
            "active_from" => "desc",
            "name" => "asc",
        );

        if(is_numeric($this->arParams["ELEMENT_ID"])) {
            $arFilter = array(
                "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
                "ID" => $this->arParams["ELEMENT_ID"],
            );
        } else {
            $arFilter = array(
                "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
                "CODE" => $this->arParams["ELEMENT_ID"],
            );
        }

        $rsVacancy = CIBlockElement::GetList($arSort, $arFilter);
        $rsVacancy->SetUrlTemplates($this->arParams["DETAIL_PAGE_URL"], "", $this->arParams["LIST_PAGE_URL"]);

        $vacancy = $rsVacancy->GetNextElement();

        if($vacancy !== false) {
            $item = $vacancy->GetFields();
            $item["PROPERTIES"] = $vacancy->GetProperties();

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

            $arResult["ITEM"] = $item;
        }
        else {
            header("Location: /404.php");
        }

        $this->IncludeComponentTemplate();
    }

}
