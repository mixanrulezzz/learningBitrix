<?php
    session_start();
    CModule::AddAutoloadClasses(
        '',
        array(
            'vacancyAgent' => '/local/classes/agents/vacancy.php'
        )
    );