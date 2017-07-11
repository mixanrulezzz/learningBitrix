<?php

class VacancyAgent {

    static function DeactivateVacancy() {

        CModule::IncludeModule("iblock");
        $blockID = "21";

        $sort = self::prepareSort();
        $filter = self::prepareFilter($blockID);
        $select = self::prepareSelect();

        CIBlockElement::GetList($sort, $filter, false, false, $select);

    }

    static function prepareSort() {
        return array(
            "active_from" => "desc",
            "name" => "asc",
        );
    }

    static function prepareFilter($blockID) {
        return array(
            "ACTIVE" => "Y",
            "IBLOCK_ID" => $blockID,
        );
    }

    static function prepareSelect() {
        return array("ID", "IBLOCK_ID", "PROPERTY_ACTIVE_TO");
    }

}