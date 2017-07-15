<?php

class VacancyAgent {

        public static function DeactivateVacancy() {

        CModule::IncludeModule("iblock");
        $blockID = "21";

        $sort = self::prepareSort();
        $filter = self::prepareFilter($blockID);
        $select = self::prepareSelect();

        $listOfElements = CIBlockElement::GetList($sort, $filter, false, false, $select);

        self::updateElements($listOfElements);

        return "VacancyAgent::DeactivateVacancy();";
    }

    private static function updateElements($listOfElements) {

        $element = $listOfElements->GetNextElement();
        while($element){

            $item = $element->GetFields();
            $now = new DateTime("now");
            $activeToTime = DateTime::createFromFormat("d.m.Y", $item["PROPERTY_ACTIVE_TO_VALUE"]);

            if($now >= $activeToTime && $activeToTime !== false) {

                $el = new CIBlockElement();
                $updatedFields = array(
                    "ACTIVE" => "N",
                );
                $elementID = $item["ID"];

                $el->Update($elementID, $updatedFields);
            }

            $element = $listOfElements->GetNextElement();
        }
    }

    public static function timeDifference($timeString){
        $now = new DateTime("now");
        $activeToTime = DateTime::createFromFormat("d.m.Y", $timeString);
        var_dump($now >= $activeToTime);
    }

    private static function prepareSort() {
        return array(
            "active_from" => "desc",
            "name" => "asc",
        );
    }

    private static function prepareFilter($blockID) {
        return array(
            "ACTIVE" => "Y",
            "IBLOCK_ID" => $blockID,
        );
    }

    private static function prepareSelect() {
        return array("ID", "IBLOCK_ID", "PROPERTY_ACTIVE_TO");
    }
}