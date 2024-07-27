<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use classes\Services\FormHandler;

$request = \Bitrix\Main\Context::getCurrent()->getRequest()->getPost('ajax');

if ($model = new FormHandler($request)) {
    $response = $model->run();
} else {
    $response = ['error' => 'Отсутствуют необходимые параметры'];
}

echo json_encode($response);


