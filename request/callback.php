<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use classes\Services\FormHandler;

if ($model = new FormHandler('feedback')) {
    $response = $model->run();
} else {
    $response = ['error' => 'Отсутствуют необходимые параметры'];
}

echo json_encode($response);
