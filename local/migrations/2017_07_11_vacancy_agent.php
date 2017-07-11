<?php
    $is_console = PHP_SAPI == 'cli' || (!isset($_SERVER['DOCUMENT_ROOT']) && !isset($_SERVER['REQUEST_URI']));
    if ($is_console === false) { die; }

    @set_time_limit(0);
    @ignore_user_abort(true);

    $_SERVER["DOCUMENT_ROOT"] = realpath(__DIR__ . '/../../');
    $DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];

    // Если инициализировать данную константу каким либо значением, то это запретит сбор статистики на данной странице.
    define('NO_KEEP_STATISTIC', true);
    // Если инициализировать данную константу значением "true" до подключения пролога, то это отключит проверку прав на доступ к файлам и каталогам.
    define('NOT_CHECK_PERMISSIONS', true);
    define('CHK_EVENT', true);
    // При установке в true отключает выполнение всех агентов
    define("NO_AGENT_CHECK", true);

    /** @noinspection PhpIncludeInspection */
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

    CAgent::AddAgent(
        "VacancyAgent::DeactivateVacancy();", // имя функции
        "",                          // идентификатор модуля
        "N",                                  // агент не критичен к кол-ву запусков
        86400,                                // интервал запуска - 1 сутки
        "",                // дата первой проверки на запуск
        "Y",                                  // агент активен
        "",                // дата первого запуска
        30);