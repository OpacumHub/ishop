<?php

$sPath = '/local/php_interface/custom/';


#
# константы
#
include_once($_SERVER['DOCUMENT_ROOT'].$sPath.'constants.php');

#
# подключение кастомных классов
#
CModule::AddAutoloadClasses(
    '',
    array(
        'CISEventHandlers' => $sPath.'classes/CISEventHandlers.php',
        'CISCity' => $sPath.'classes/CISCity.php'
    )
);

#
# функции (объявлять функции только здесь)
#
include_once($_SERVER['DOCUMENT_ROOT'].$sPath.'functions.php');

#
# обработчики событий
#
include_once($_SERVER['DOCUMENT_ROOT'].$sPath.'handlers.php');