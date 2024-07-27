<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$request = \Bitrix\Main\Context::getCurrent()->getRequest();
$fileId = \classes\Models\FiveKFiveAuto\Common\CommonData::getInstance()->getPropertiesByCode('POLICY_FOOTER')->getResult()[0] ?: '';

include '_promotion.php';
include '_callback.php';
include '_quiz.php';
include '_ok.php';